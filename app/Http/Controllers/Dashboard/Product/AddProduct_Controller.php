<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
    public function ShowPageFirst()
    {
        $categories = Category::all();
        return view('dashboard.products.add-product-first', [
            '__title' => 'Add Product',
            'categories' => $categories
        ]);
    }

    public function UpdatePage()
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
            if (isset($request->title)) {
                $title = $request->title;
            } else {
                $title = '';
            }
            if (isset($request->category)) {
                $category = $request->category;
            } else {
                $category = '';
            }
            if (isset($request->materials)) {
                $materials = $request->materials;
            } else {
                $materials = '';
            }
            if (isset($request->date_of_manufacture)) {
                $date_of_manufacture = $request->date_of_manufacture;
            } else {
                $date_of_manufacture = '';
            }
            if (isset($request->cargo_price)) {
                $cargo_price = $request->cargo_price;
            } else {
                $cargo_price = '';
            }
            if (isset($request->cargo_time)) {
                $cargo_time = $request->cargo_time;
            } else {
                $cargo_time = '';
            }
            if (isset($request->item_number)) {
                $item_number = $request->item_number;
            } else {
                $item_number = '';
            }


            if (isset($request->color)) {
                $color = $request->color;
            } else {
                $color = '';
            }
            if (isset($request->version)) {
                $product_version = $request->version;
            } else {
                $product_version = '';
            }
            if (isset($request->bulbs)) {
                $bulbs = $request->bulbs;
            } else {
                $bulbs = '';
            }
            if (isset($request->desc_title)) {
                $desc_title = $request->desc_title;
            } else {
                $desc_title = '';
            }
            if (isset($request->description)) {
                $description = $request->description;
            } else {
                $description = '';
            }
            $negotiable = ($request->negotiable == 'on' || $request->negotiable == 1) ? true : 0;
            $images = [];


            foreach ($request->file('other_medias') as $media) {
                $images[] = $this->FileUploadAndCreate($media);
            }

            $added_product = Product::create([
                'title' => $title,
                'category' => $category,
                'materials' => $materials,
                'negotiable' => $negotiable,
                'date_of_manufacture' => $date_of_manufacture,
                'cargo_price' => $cargo_price,
                'cargo_time' => $cargo_time,
                'stock' => $request->stock,
                'images' => json_encode($images, TRUE),
                'desc_title' => $desc_title,
                'description' => $description,
            ]);
            $pid = $added_product->id;


            return response()->json([
                'status_message' => "Ürününüz eklendi, özellik ekleme sayfasına yönleniyorsunuz...",
                'status_code' => 'success',
                'pid' => $pid,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status_message' => 'Ürün Eklenemedi, lütfen tekrar deneyin! HATA KODU: P1872',
                'developer_message' => $exception->getMessage(),
                'status_code' => 'failed',
            ]);
        }
    }
    public function UpdateProduct(Request $request)
    {
        try {
            $title = $request->title;
            $category = $request->category;
            $materials = $request->materials;
            $negotiable = ($request->negotiable == 'on' || $request->negotiable == 1) ? true : 0;
            $date_of_manufacture = $request->date_of_manufacture;
            $cargo_price = $request->cargo_price;
            $cargo_time = $request->cargo_time;

            $desc_title = $request->desc_title;
            $description = $request->description;
            $images = [];


            foreach ($request->file('other_medias') as $media) {
                $images[] = $this->FileUploadAndCreate($media);
            }


            $added_product_detail = DB::table('products')
                ->where('id', $request->id)
                ->update([
                    'title' => $title,
                    'category' => $category,
                    'materials' => $materials,
                    'negotiable' => $negotiable,
                    'date_of_manufacture' => $date_of_manufacture,
                    'cargo_price' => $cargo_price,
                    'cargo_time' => $cargo_time,
                    'stock' => $request->stock,
                    'images' => json_encode($images, TRUE),
                    'desc_title' => $desc_title,
                    'description' => $description,
                ]);

            $pid = $request->id;


            return response()->json([
                'status_message' => "Ürününüz eklendi, özellik ekleme sayfasına yönleniyorsunuz...",
                'status_code' => 'success',
                'pid' => $pid,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status_message' => 'Ürün Eklenemedi, lütfen tekrar deneyin! HATA KODU: P1872',
                'developer_message' => $exception->getMessage(),
                'status_code' => 'failed',
            ]);
        }
    }
    function FileUploadAndCreate($file)
    {
        try {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file_extension = $file->extension();
            $file->move(public_path('uploads/product-images/'), $fileName);

            if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png')
                $file_extension = 'image';
            else
                $file_extension = 'video';

            return [
                'name' => $file->getClientOriginalName(),
                'url' => 'uploads/product-images/' . $fileName,
                'type' => $file_extension,
            ];
        } catch (\Exception $exception) {
            return false;
        }
    }
}
