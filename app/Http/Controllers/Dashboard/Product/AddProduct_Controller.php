<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\True_;
use Ramsey\Uuid\Exception\TimeSourceException;

use Illuminate\Support\Facades\DB;
use App\Models\ProductDetail;

class AddProduct_Controller extends Controller
{
    public function ShowPage()
    {
        $categories = Category::all();
        return view('dashboard.products.add-product', [
            '__title' => 'Add Product',
            'categories' => $categories
        ]);
    }

    public function UpdatePage(Request $request)
    {

        if (isset($_GET['id'])) {
            $Product_details = Product::where('id', '=', $_GET['id'])->get();
        } else {
            $Product_details = NULL;
        }


        $categories = Category::all();

        return view('dashboard.products.update-product', [
            '__title' => 'Update Product',
            'categories' => $categories,
            'data' => $Product_details
        ]);
    }

    public function AddProduct(Request $request)
    {
        try {
            $error = false;
            $error_message = '';

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

            if ($error){
                return response([
                    'succeeded' => false,
                    'message' => $error_message,
                ]);
            }

            $product_images = [];
            foreach ($request->allFiles()['product_images'] as $product_image){
                $product_images[] = $this->FileUploadAndCreate($product_image, 'product-images');
            }
            $product_images = json_encode($product_images);

            $product_id = Product::firstOrCreate(
                [
                    'product_name' => $product_name,
                ],
                [
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
            )->id;


            $product_detail_count = count($request->product_number);

            for ($i=0; $i < $product_detail_count; $i++){
                $images = [];
                $index = $i + 1;
                if (isset($request->diameter_images)){
                    foreach ($request->allFiles()['diameter_images']["diameter_{$index}"] as $diameter_image) {
                        foreach ($diameter_image as $image)
                            $images[] = $this->FileUploadAndCreate($image, 'product-images');
                    }
                }

                $images = json_encode($images);
                ProductDetail::create([
                    'product_id' => $product_id,
                    'product_number' => $request->product_number[$i] ?? '',
                    'diameter' => $request->diameter[$i] ?? '',
                    'height' => $request->height[$i] ?? '',
                    'weight' => $request->weight[$i] ?? '',
                    'stock' => $request->stock[$i] ?? '',
                    'list_price' => $request->list_price[$i] ?? '',
                    'diameter_images' => $images ?? '',
                    'color' => $request->color[$i] ?? '',
                    'bulbs' => $request->bulbs[$i] ?? '',
                    'diamond_slots' => $request->diamond_slot[$i] ?? '',
                ]);
            }

            return response(
                [
                'message' => "Ürününüz eklendi!",
                'succeeded' => true,
                'pid' => $product_id,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'succeeded' => false,
                'message' => 'Ürün Eklenemedi!<br>' . $exception->getMessage(),
                'developer_message' => $exception->getMessage(),
            ]);
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
