<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailSource;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class Products_Controller extends Controller
{
    #region PRODUCT
    public function DeleteProduct(Request $request)
    {
        try {
            $result = Product::query()->where('id', '=', $request->id)->delete();
            if ($result){
                return response()->json([
                    'status' => 'success',
                    'message' => 'The product has been successfully deleted',
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Couldn't delete product",
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'failed',
                'message' => "Couldn't delete product",
                'error-code' => 'DP101',
            ]);
        }
    }

    public function SetProduct(Request $request)
    {

    }
    #endregion

    //------------------------------------------------------------------------------------

    #region PRODUCT DETAIL
    public function DeleteProductDetail(Request $request)
    {
        try {
            $result = ProductDetail::query()->where([
                ['id', '=', $request->id],
                ['product_id', '=', $request->product_id],
            ])
                ->delete();
            if ($result > 0){
                return response()->json([
                    'status' => 'success',
                    'message' => 'The product detail has been successfully deleted',
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Couldn't delete product detail",
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'failed',
                'message' => "Couldn't delete product detail",
                'error-code' => 'DPD101',
            ]);
        }
    }

    public function SetProductDetail(Request $request)
    {
        $product_id = $request->product_id;
    }
    #endregion

    //------------------------------------------------------------------------------------

    #region PRODUCT DETAIL
    public function DeleteProductMedia(Request $request)
    {
        try {
            $result = DetailSource::query()->where([
                ['id', '=', $request->id],
                ['product_detail_id', '=', $request->product_id],
            ])
                ->delete();
            if ($result > 0){
                return response()->json([
                    'status' => 'success',
                    'message' => 'The media has been successfully deleted',
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Couldn't delete media",
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'failed',
                'message' => "Couldn't delete media",
                'error-code' => 'DPM101',
            ]);
        }
    }
    #endregion
}
