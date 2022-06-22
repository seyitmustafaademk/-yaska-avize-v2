<?php

namespace App\Http\Controllers\Dashboard\EditPages;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Expression;

class EditAboutUs_Controller extends Controller
{
    public function ShowSection1()
    {
        $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Kurumsal Başlıklar',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.about-us.section1', $data);
    }
    public function EditSection1(Request $request)
    {
        try {
            $data = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
            $data = empty($data) ? null : json_decode($data->content, TRUE)['about-data'];

            $top_title = $request->top_title;
            $title = $request->title;
            $description = $request->summernote;

            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');
            $now_date = Carbon::now();

            $first = false;
            foreach ($images as $k => $img) {

                try {
                    $image_data = $img->getAttribute('src');
                    list($type, $image_data) = explode(';', $image_data);
                    list(, $image_data) = explode(',', $image_data);

                    $image_data = base64_decode($image_data);
                    $image_name = Str::slug(microtime(true) . "-$k-$title");
                    $image_path = "uploads\blog-content\\" . Str::slug($now_date . '-' . strtolower($title)) . "\\$image_name.png";

                    if (!$first){
                        $first = true;
                    }
                    Storage::disk('public_folder')->put($image_path, $image_data);

                    $image_path = str_replace('\\', '/', $image_path);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset($image_path));
                }catch (\Exception $exception){

                }
            }
            $description = $dom->saveHTML();

            $data[] = [
                'top_title' => $top_title,
                'title' => $title,
                'description' => $description,
            ];


            $content = json_encode([
                'about-data' => $data,
            ], TRUE);

            $created = PageContent::updateOrCreate(
                [
                    'page_name' => 'about-us',
                    'section_name' => 'section_1',
                ],
                [
                    'content' => $content,
                ]
            );

            return redirect()->route('edit-pages.about-us.section1');

        } catch (\Exception $exception){
            return redirect()->route('edit-pages.about-us.section1');
        }

    }
    public function DeleteSection1($id)
    {
        $real_data = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['about-data'];
        $real_data = empty($real_data) ? null : json_decode($real_data->content, TRUE);

        if ($data != null){
            foreach ($data as $key => $datum) {
                if ($key == $id){
                    unset($data[$key]);
                }
            }
        }

        $content = json_encode([
            'about-data' => $data,
        ], TRUE);

        PageContent::updateOrCreate(
            [
                'page_name' => 'about-us',
                'section_name' => 'section_1',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.about-us.section1');
    }

    public function ShowEdit($id)
    {
        if (!is_numeric($id) || !isset($id) )
            return redirect()->route('edit-pages.about-us.section1');


        $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $new_content = '';
        foreach ($content['about-data'] as $key => $item){
            if ($id == $key){
                $new_content = [
                    'id' => $key,
                    'top_title' => $item['top_title'],
                    'title' => $item['title'],
                    'description' => $item['description'],
                ];
                break;
            }
        }

        $data = [
            '__title' => 'Edit Kurumsal Başlık',
            'new_content' => $new_content,
        ];
//        return $data;

        return view('dashboard.edit-pages.about-us.section1-edit', $data);
    }
    public function EditContent(Request $request)
    {
        $id = $request->id;
        $top_title = $request->top_title;
        $title = $request->title;
        $description = $request->summernote;


        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_use_internal_errors(false);
        $images = $dom->getElementsByTagName('img');
        $now_date = Carbon::now();

        $first = false;
        foreach ($images as $k => $img) {
            try {
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $image_name = Str::slug(microtime(true) . "-$k-$title");
                $image_path = "uploads\blog-content\\" . Str::slug($now_date . '-' . strtolower($title)) . "\\$image_name.png";

                if (!$first){
                    $first = true;
                }
                Storage::disk('public_folder')->put($image_path, $data);

                $image_path = str_replace('\\', '/', $image_path);
                $img->removeAttribute('src');
                $img->setAttribute('src', asset($image_path));
            }catch (\Exception $exception){ }

        }

        $description = $dom->saveHTML();

        $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_1')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        foreach ($content['about-data'] as $key => $item) {
            if ($key == $id){
                $content['about-data'][$key]['top_title'] = $top_title;
                $content['about-data'][$key]['title'] = $title;
                $content['about-data'][$key]['description'] = $description;
            }
        }

        $content = json_encode($content, TRUE);

        $created = PageContent::where('page_name', '=', 'about-us')->where('section_name', 'section_1')->update([
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.about-us.section1');
    }

    public function ShowSection2()
    {
        $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_2')->first();

        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Kurucu Mesajı',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.about-us.section2', $data);
    }
    public function EditSection2(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/about-us/section-2'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/about-us/section-2');
        }
        else {
            $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_2')->first();
            $content = empty($content) ? null : json_decode($content->content, TRUE);
            $primary_status = $content['image'];
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $primary_status,
            'founder_name' => $request->founder_name,
            'founder_title' => $request->founder_title,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'about-us',
                'section_name' => 'section_2',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.about-us.section2');
    }

    public function ShowSection3()
    {
        $content = PageContent::where('page_name', '=', 'about-us')->where('section_name', '=', 'section_3')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Raportajlar',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.about-us.section3', $data);
    }

    function FileUploadAndCreate($file, $folder_name){
        try {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file_extension = $file->extension();
            $file->move(public_path("uploads/$folder_name/"), $fileName);

            if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png')
                $file_extension = 'image';
            else
                $file_extension = 'video';

            return [
                'name' => $file->getClientOriginalName(),
                'url' => "uploads/$folder_name/" . $fileName,
                'type' => $file_extension,
            ];
        }catch (\Exception $exception){
            return false;
        }
    }
}
