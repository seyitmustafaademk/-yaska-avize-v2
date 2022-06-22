<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class Contact_Controller extends Controller
{
    public function ShowPage()
    {
        $contacts = Contact::all();
//        return $contacts;

        $data = [
            '__title' => 'Contact',
            'contacts' => $contacts,
        ];
        return view('dashboard.contact', $data);
    }
    public function Delete(Request $request)
    {
        if (!isset($request->id))
            return response()->json([
                'status_code' => 406,
                'response_message' => 'Geçersiz id değeri!',
            ]);
        try {
            $id = intval($request->id);

            /* Resmi sil */
            $image_url = Contact::find($id)->first();
            \File::delete(public_path($image_url['image']));

            $deleted = Contact::find($id)->delete();
            if ($deleted == true)
                return response()->json([
                    'status_code' => 200,
                    'response_message' => "$id numaralı kayıt başarıyla silindi."
                ]);
            else
                return response()->json([
                    'status_code' => 406,
                    'response_message' => 'Silme işlemi gerçekleştirilemedi, daha sonra tekrar deneyin!',
                ]);
        } catch (\Exception $exception){
            return response()->json([
                'status_code' => 400,
                'response_message' => 'Silme işlemi gerçekleştirilemedi, daha sonra tekrar deneyin!',
                'detailed_message' => "Hata Mesajı: \n {$exception->getMessage()}",
            ]);
        }
    }

    public function UpdateRead(Request $request)
    {
        if (!isset($request->id) || !is_numeric($request->id))
            return response()->json([
                'status_code' => 406,
                'response_message' => 'Geçersiz id değeri!',
            ]);
        try {
            $status = isset($request->status) ? !boolval($request->status) : false;
            $id = intval($request->id);
            $updated = Contact::where('id', $id)->update(['read' => $status]);
            if ($updated == true)
                return response()->json([
                    'status_code' => 200,
                    'read' => $status,
                    'response_message' => "$id numaralı kayıt " . ($status ? 'okundu' : 'okunmadı') . " olarak güncellendi."
                ]);
            else
                return response()->json([
                    'status_code' => 406,
                    'response_message' => 'Güncelleme işlemi gerçekleştirilemedi, daha sonra tekrar deneyin!',
                ]);
        } catch (\Exception $exception){
            return response()->json([
                'status_code' => 400,
                'response_message' => 'Güncelleme işlemi gerçekleştirilemedi, daha sonra tekrar deneyin!',
                'detailed_message' => "Hata Mesajı: \n {$exception->getMessage()}",
            ]);
        }
    }
}
