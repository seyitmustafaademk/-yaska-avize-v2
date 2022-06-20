<?php

namespace App\Http\Controllers\Dashboard\EditPages;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Product;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditHomepage_Controller extends Controller
{
    #region SECTION 1
    public function ShowSection1()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_1')->first();
        $content = json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 1',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section1', $data);
    }
    public function EditSection1(Request $request)
    {
        $content = json_encode([
            'title' => $request->title,
            'description' => $request->description,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'section_name' => 'section_1',
                'page_name' => 'homepage',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section1');
    }
    #endregion

    #region SECTION 2
    public function ShowSection2()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_2')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 2',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section2', $data);
    }
    public function EditSection2(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/homepage/section-2'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-2');
        }
        else {
            $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_2')->first();
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
                'section_name' => 'section_2',
                'page_name' => 'homepage',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section2');
    }
    #endregion

    #region SECTION 3
    public function ShowSection3()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_3')->get();
//return $content;

        $data = [
            '__title' => 'Edit Section 3',
            'contents' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section3', $data);
    }
    public function EditSection3(Request $request)
    {
        $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-3');

        $content = json_encode([
            'desc_title' => $request->desc_title,
            'description' => $request->description,
            'title' => $request->title,
            'url' => $request->url,
            'image' => $primary_status
        ], TRUE);

        PageContent::create([
                'page_name' => 'homepage',
                'section_name' => 'section_3',
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section3');
    }
    public function DeleteSection3($id)
    {
        $delete_data = PageContent::where('page_name', '=', 'homepage')->where('id', '=', $id)->first();
        $content = json_decode($delete_data->content, TRUE);
        $image_name = $content['image']['url'];
        $delete_data->delete();
        \File::delete(public_path($image_name));

        return redirect()->route('edit-pages.homepage.section3');
    }
    #endregion

    #region POPUPER URUNLER
    public function ShowSection4()
    {
        $contents = DB::select("
            SELECT 
                p.id AS p_id, p.product_name, p.category, p.materials, p.date_of_manufacture, p.slug, p.cargo_price, p.cargo_time, p.product_images,
                pd.id as pd_id, pd.diameter, pd.height, pd.weight,pd.stock, pd.list_price, pd.diameter_images,
                pc.id
            FROM
                page_contents pc
                
            JOIN product_details pd
            ON pd.id = pc.content
            JOIN products p
            ON p.id = pd.product_id;");

        $products = DB::select("
            SELECT p.id AS p_id, p.product_name, p.category, p.materials, p.date_of_manufacture, p.slug, p.cargo_price, p.cargo_time, p.product_images, 
                    pd.id AS pd_id, pd.diameter, pd.height, pd.weight,pd.stock, pd.list_price, pd.diameter_images
            FROM product_details pd
            
            JOIN products p
            ON pd.product_id = p.id
            
            ORDER BY p.product_name ASC");


        $data = [
            '__title' => 'Edit Section 4',
            'products' => $products,
            'contents' => $contents,
        ];
        return view('dashboard.edit-pages.homepage.section4', $data);
    }
    public function EditSection4(Request $request)
    {
        PageContent::firstOrCreate(
            [
                'page_name' => 'homepage',
                'content' => $request->product,
            ],
            [
                'section_name' => 'section_4',
            ]
        );
        return redirect()->route('edit-pages.homepage.section4');
    }
    public function DeleteSection4($id)
    {
        PageContent::where('page_name', '=', 'homepage')->where('id', '=', $id)->delete();

        return redirect()->route('edit-pages.homepage.section4');
    }
    #endregion

    #region SECTION 5
    public function ShowSection5()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_5')->first();

        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Edit Section 5',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section5', $data);
    }
    public function EditSection5(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/homepage/section-5'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-5');
        }
        else {
            $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_5')->first();
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
                'page_name' => 'homepage',
                'section_name' => 'section_5',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section5');
    }
    #endregion

    #region PHOTO GALLERY (SLIDER)
    public function ShowSection6()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_6')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Photo Gallery (Slider)',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section6', $data);
    }
    public function EditSection6(Request $request)
    {
        $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-6');

        $data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_6')->first();
        $data = empty($data) ? null : json_decode($data->content, TRUE)['images'];
        $data[] = $primary_status;

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'images' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_6',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section6');
    }
    public function DeleteSection6($id)
    {

        $real_data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_6')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['images'];
        $real_data = empty($real_data) ? null : json_decode($real_data->content, TRUE);

        if ($data != null){
            foreach ($data as $key => $datum) {
                if ($key == $id){
                    $image_name = $datum['url'];
                    \File::delete(public_path($image_name));
                    unset($data[$key]);

                }
            }
        }

        $content = json_encode([
            'top_title' => $real_data['top_title'],
            'title' => $real_data['title'],
            'description' => $real_data['description'],
            'images' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_6',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section6');
    }
    #endregion

    #region KURUCU MESAJI
    public function ShowSection7()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_7')->first();

        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'Kurucu Mesajı',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section7', $data);
    }
    public function EditSection7(Request $request)
    {
        if ($request->hasFile('primary_image')){
            \File::deleteDirectory(public_path('uploads/homepage/section-7'));
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-7');
        }
        else {
            $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_7')->first();
            $content = empty($content) ? null : json_decode($content->content, TRUE);
            $primary_status = $content['image'];
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'customer_name' => $request->customer_name,
            'customer_description' => $request->customer_description,
            'image' => $primary_status,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_7',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section7');
    }
    #endregion

    #region FAQ
    public function ShowSection8()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_8')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        $data = [
            '__title' => 'FAQ',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section8', $data);
    }
    public function EditSection8(Request $request)
    {
        $data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_8')->first();
        $data = empty($data) ? null : json_decode($data->content, TRUE)['sss'];
        $data[] = [
            'sss_title' => $request->sss_title,
            'sss_description' => $request->sss_description,
        ];

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'sss' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_8',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section8');
    }
    public function DeleteSection8($id)
    {
        $real_data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_8')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['sss'];
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
            'sss' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_8',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section8');
    }
    #endregion

    #region REFERENCES
    public function ShowSection9()
    {
        $content = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_9')->first();
        $content = empty($content) ? null : json_decode($content->content, TRUE);

        //return $content;

        $data = [
            '__title' => 'References',
            'content' => $content,
        ];
        return view('dashboard.edit-pages.homepage.section9', $data);
    }
    public function EditSection9(Request $request)
    {
        $data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_9')->first();
        $data = empty($data) ? null : json_decode($data->content, TRUE)['images'];

        if ($request->hasFile('primary_image')){
            $primary_status = $this->FileUploadAndCreate($request->primary_image, '/homepage/section-9');
            $primary_status['image_url'] = $request->image_url;
            $data[] = $primary_status;
        }

        $content = json_encode([
            'top_title' => $request->top_title,
            'title' => $request->title,
            'description' => $request->description,
            'images' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_9',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section9');
    }
    public function DeleteSection9($id)
    {
        $real_data = PageContent::where('page_name', '=', 'homepage')->where('section_name', '=', 'section_9')->first();
        $data = empty($real_data) ? null : json_decode($real_data->content, TRUE)['images'];
        $real_data = empty($real_data) ? null : json_decode($real_data->content, TRUE);

        if ($data != null){
            foreach ($data as $key => $datum) {
                if ($key == $id){
                    $image_name = $datum['url'];
                    \File::delete(public_path($image_name));
                    unset($data[$key]);
                }
            }
        }

        $content = json_encode([
            'top_title' => $real_data['top_title'],
            'title' => $real_data['title'],
            'description' => $real_data['description'],
            'images' => $data,
        ], TRUE);

        $created = PageContent::updateOrCreate(
            [
                'page_name' => 'homepage',
                'section_name' => 'section_9',
            ],
            [
                'content' => $content,
            ]
        );

        return redirect()->route('edit-pages.homepage.section9');
    }
    #endregion


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
