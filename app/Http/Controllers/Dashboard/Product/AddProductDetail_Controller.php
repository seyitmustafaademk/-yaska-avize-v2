<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;

class AddProductDetail_Controller extends Controller
{
    public function ShowPage($pid = '')
    {
        $data = [
            '__title' => 'Add Product Detail',
            'pid' => $pid,
        ];
        return view('dashboard.products.add-product-detail', $data);
    }

    public function UpdatePage($pid = '')
    {

        if (isset($_GET['id'])) {
            $Product_details = ProductDetail::where('id', '=', $_GET['id'])->get();
        } else {
            $Product_details = NULL;
        }

        $data = [
            '__title' => 'Update Product Detail',
            'pid' => $pid,
            'data' => $Product_details
        ];
        return view('dashboard.products.update-product-detail', $data);
    }


    public function AddDetail(Request $request)
    {
        try {
            $pid = $request->pid;
            $diameter = $request->diameter;
            $height = $request->height;
            $weight = $request->weight;
            $stock = $request->stock;
            $list_price = $request->list_price;


            $primary_status = $this->FileUploadAndCreate($request->file('primary_image'));
            if (!$primary_status)
                return response()->json([
                    'status_message' => "Birincil Resim Eklenirken Hata Oluştu.", 'status_code' => 'failed'
                ]);

            $added_product_detail = ProductDetail::create([
                'product_id' => $pid,
                'diameter' => $diameter,
                'height' => $height,
                'weight' => $weight,
                'stock' => $stock,
                'list_price' => $list_price,
                'item_number' => $request->item_number,
                'color' => $request->color,
                'version' => $request->version,
                'bulbs' => $request->bulbs,
                'primary_image' => json_encode($primary_status, TRUE),
            ]);

            if ($added_product_detail) {
                return response()->json([
                    'status_message' => "Ürün detayı başarıyla eklendi.",
                    'status_code' => 'success',
                ]);
            } else {
                return response()->json([
                    'status_message' => "Ürün detayı eklenemedi!",
                    'status_code' => 'failed',
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status_message' => 'Ürün Eklenemedi, lütfen tekrar deneyin! HATA KODU: P1871',
                'developer_message' => $exception->getMessage(),
                'status_code' => 'failed',
            ]);
        }
    }
    public function UpdateProductDetail(Request $request)
    {
        try {
            $diameter = $request->diameter;
            $height = $request->height;
            $weight = $request->weight;
            $stock = $request->stock;
            $list_price = $request->list_price;


            $primary_status = $this->FileUploadAndCreate($request->file('primary_image'));
            if (!$primary_status)
                return response()->json([
                    'status_message' => "Birincil Resim Eklenirken Hata Oluştu.", 'status_code' => 'failed'
                ]);


            $added_product_detail = DB::table('product_details')
                ->where('id', $request->id)
                ->update([
                    'diameter' => $diameter,
                    'height' => $height,
                    'weight' => $weight,
                    'stock' => $stock,
                    'list_price' => $list_price,
                    'item_number' => $request->item_number,
                    'color' => $request->color,
                    'version' => $request->version,
                    'bulbs' => $request->bulbs,
                    'primary_image' => json_encode($primary_status, TRUE),
                ]);


            if ($added_product_detail) {
                return response()->json([
                    'status_message' => "Ürün detayı başarıyla eklendi.",
                    'status_code' => 'success',
                ]);
            } else {
                return response()->json([
                    'status_message' => "Ürün detayı eklenemedi!",
                    'status_code' => 'failed',
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status_message' => 'Ürün Eklenemedi, lütfen tekrar deneyin! HATA KODU: P1871',
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
