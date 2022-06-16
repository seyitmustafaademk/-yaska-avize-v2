<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Component\Console\Helper\Table;

class Products_Controller extends Controller
{
    public function ShowPage()
    {
        $products = Product::all();
        $categories = Category::all('id', 'category_name');

//        return json_decode($products[0]->product_images);

        $data = [
            '__title' => 'Products',
            'categories' => $categories,
            'products' => $products,
        ];
        return view('dashboard.products.list', $data);
    }

    public function UpdateProduct(Request $request)
    {
        try {
            $id = intval($request->id);
            $product_name = $request->product_name;
            $category = $request->category;
            $materials = $request->materials;
            $date_of_manufacture = $request->date_of_manufacture;
            $special_cargo = $request->special_cargo == 'on' ? true : false;
            $cargo_time = $request->cargo_time;
            $cargo_price = $request->cargo_price;

            DB::table('products')
                ->where('id', '=', $id)
                ->update([
                    'product_name' => $product_name,
                    'category' => $category,
                    'materials' => $materials,
                    'date_of_manufacture' => $date_of_manufacture,
                    'special_cargo' => $special_cargo,
                    'cargo_time' => $cargo_time,
                    'cargo_price' => $cargo_price,
                ]);
            return redirect()->route('admin.products');
        } catch (\Exception $exception) {
            return redirect()->route('admin.products');
        }
    }

    public function DeleteProduct($id)
    {
        $deleted = Product::where('id', '=', $id)->delete();

        return redirect()->route('admin.products');
    }

    public function UpdateFullProductPage($id = null)
    {
        if ($id === null){
            return redirect()->route('admin.products');
        }

        $product = Product::find($id);
        $data = [
            '__title' => 'Ürün Güncelleme',
            'product' => $product,
        ];

//        return json_decode($product->more_materials);
//        return gettype( json_decode($product->more_materials) );


//        return json_decode($product->product_images);

        return view('dashboard.products.update-product', $data);
    }

    public function UpdateFullProduct(Request $request)
    {
//        return $request->allFiles()['product_images'];
        $id = $request->id;
        $old_product = Product::where('id', '=',$id )->get()[0];
        $old_images = json_decode($old_product->product_images, TRUE);
        foreach ($old_images as $old_image){
            \File::delete(public_path($old_image['url']));
        }

        try {

            $product_name = $request->product_name ?? '';
            $category = $request->category ?? '';
            $production_date = $request->production_date ?? '';
            if (isset($request->material_title) || isset($request->material_description))
                $ek_detaylar = json_encode(array_combine($request->material_title, $request->material_description)) ?? '';
            else
                $ek_detaylar = '';
            $materials = $request->materials ?? '';
            $special_cargo = $request->special_cargo == 'on' ? true : false;
            $cargo_time = $request->cargo_time ?? '';
            $cargo_price = $request->cargo_price ?? '';

            $description_title = $request->description_title;
            $description_content = $this->GetSummernoteData($request->product_name, $request->description_content);


            $product_images = [];
            foreach ($request->file('product_images') as $product_image){
                $product_images[] = $this->FileUploadAndCreate($product_image, 'product-images');
            }
            $product_images = json_encode($product_images);


            $product_id = Product::where('id', '=', $id)
            ->update([
                    'product_name' => $product_name,
                    'category' => $category,
                    'materials' => $materials,
                    'more_materials' => json_encode($ek_detaylar),
                    'date_of_manufacture' => $production_date,
                    'special_cargo' => $special_cargo,
                    'cargo_time' => $cargo_time,
                    'cargo_price' => $cargo_price,
                    'description_title' => $description_title,
                    'description_content' => $description_content,
                    'product_images' => $product_images,
                ]
            );

            return redirect()->route('admin.products');
        } catch (\Exception $exception){
//            return redirect()->route('admin.update-full-product', $id);
            return $exception->getLine();
        }
    }


    function FileUploadAndCreate($file, $path)
    {
        try {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file_extension = $file->extension();
            $file->move(public_path("uploads/$path/"), $fileName);

            if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png')
                $file_extension = 'image';
            else
                $file_extension = 'video';

            return [
                'name' => $file->getClientOriginalName(),
                'url' => "uploads/$path/" . $fileName,
                'type' => $file_extension,
            ];
        } catch (\Exception $exception) {
            return false;
        }
    }

    function GetSummernoteData($title, $description){

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
        return $dom->saveHTML();
    }

}





/*            $images = [];



            foreach ($request->file('other_medias') as $media) {
                $images[] = $this->FileUploadAndCreate($media);
            }*/