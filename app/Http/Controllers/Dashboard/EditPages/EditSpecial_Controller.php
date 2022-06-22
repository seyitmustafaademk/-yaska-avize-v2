<?php

namespace App\Http\Controllers\Dashboard\EditPages;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class EditSpecial_Controller extends Controller
{
    public function ShowSection1()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_1')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 1',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section1', $data);
    }
    public function EditSection1(Request $request)
    {
        if ($request->hasFile('primary_video')){
            \File::deleteDirectory(public_path('uploads/services/section-1'));
            $primary_video = $this->FileUploadAndCreate($request->primary_video, '/services/section-1');
        }
        else {
            $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_1')->first();
            $content = empty($content) ? null : json_decode($content->content, TRUE);
            $primary_video = $content['video'];
        }


        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'video' => $primary_video,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_1',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section1');
    }

    public function ShowSection2()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_2')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 2',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section2', $data);
    }
    public function EditSection2(Request $request)
    {

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'section_name' => 'section_2',
                'page_name' => 'services',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section2');
    }


    public function ShowSection3()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_3')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 3',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section3', $data);
    }
    public function EditSection3(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/services/section-3'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/services/section-3');
        }
        else {
            $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_3')->first();
            $content = empty($content) ? null : json_decode($content->content, TRUE);
            $primary_status = $content['image'];
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $primary_status,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_3',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section3');
    }

    public function ShowSection4()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_4')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 4',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section4', $data);
    }
    public function EditSection4(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/services/section-4'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/services/section-4');
        }
        else {
            $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_3')->first();
            $content = empty($content) ? null : json_decode($content->content, TRUE);
            $primary_status = $content['image'];
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $primary_status,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_4',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section4');
    }


    public function ShowSection5()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_5')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'FAQ',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section5', $data);
    }
    public function EditSection5(Request $request)
    {
        $data = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_5')->first();
        $data = empty($data) ? null : json_decode($data->content, TRUE)['faq'];
//        return $data;

        if ( $request->faq_title || $request->faq_description ){
            $data[] = [
                'faq_title' => $request->faq_title,
                'faq_description' => $request->faq_description,
            ];
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'faq' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_5',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section5');
    }
    public function DeleteSection5($id)
    {
        $real_data = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_5')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['faq'];
        $real_data = empty($real_data) ? null : json_decode($real_data->content, TRUE);

        if ($data != null){
            foreach ($data as $key => $datum) {
                if ($key == $id){
                    unset($data[$key]);
                }
            }
        }

        $content = json_encode([
            'top_title' => $real_data['top_title'],
            'title' => $real_data['title'],
            'description' => $real_data['description'],
            'faq' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_5',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section5');
    }


    public function ShowSection6()
    {
        $content = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_6')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Kullanıcı Yorumları',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.services.section6', $data);
    }

    public function EditSection6(Request $request)
    {
        $data = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_6')->first();
        $data = empty($data) ? null : json_decode($data->content, TRUE)['comments'];

        if($request->customer_name || $request->user_comment){
            $data[] = [
                'customer_name' => $request->customer_name,
                'customer_title' => $request->customer_title,
                'user_comment' => $request->user_comment,
            ];
        }


        $content = json_encode([
            'title' => $request->title,
            'description' => $request->description,
            'comments' => $data,
        ], TRUE);

        PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_6',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section6');
    }
    public function DeleteSection6($id)
    {
        $real_data = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_6')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['comments'];
        $real_data = empty($real_data) ? null : json_decode($real_data->content, TRUE);

        if ($data != null){
            foreach ($data as $key => $datum) {
                if ($key == $id){
                    unset($data[$key]);
                }
            }
        }

        $content = json_encode([
            'title' => $real_data['title'],
            'description' => $real_data['description'],
            'comments' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'services',
                'section_name' => 'section_6',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.services.section6');
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
