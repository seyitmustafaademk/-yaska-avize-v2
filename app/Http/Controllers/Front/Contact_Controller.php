<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class Contact_Controller extends Controller
{
    public function ShowPage($slug = null)
    {
        if ($slug == null){
            $products = Product::all();
        }else {
            $products = Product::where('slug', $slug)->get();
        }

        $data = [
            '__title' => 'Kontakt',
            'products' => $products,
        ];
        return view('front.contact', $data);
    }

    public function InsertContact(Request $request)
    {
        #region CHECK ---> NAME
        if (!isset($request->full_name))
            return response()->json(['status_message' => 'İsim alanı boş bırakılamaz!', 'status_code' => 'warning']);
        $fullname = trim($request->full_name);
        if (strlen($fullname) < 2 || strlen($fullname) > 75)
            return response()->json(['status_message' => "İsim alanı 100 karakterden fazla olamaz!", 'status_code' => 'warning']);
        #endregion

        #region CHECK ---> E-MAIL
        if (!isset($request->email))
            return response()->json(['status_message' => 'E-posta alanı boş bırakılamaz!', 'status_code' => 'warning']);
        $email = $request->email;
        if (strlen($email) < 1 || strlen($email) > 120)
            return response()->json(['status_message' => "E-posta alanı 120 karakterden fazla olamaz!", 'status_code' => 'warning']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
            return response()->json(['status_message' => "E-posta adresi geçerli formatta değil! $email", 'status_code' => 'warning']);
        #endregion

        #region CHECK ---> PHONE NUMBER
        if (!isset($request->phone_number)){
            return response()->json(['status_message' => 'Telefon Numarası alanı boş bırakılamaz!', 'status_code' => 'warning']);
        }
        $phone_number = str_replace(['-', '+', '(', ')', ' '], '', $request->phone_number);
        if (preg_match('/[^0-9]+/', $phone_number)){
            return response()->json(['status_message' => "'$phone_number' Numarası sadece sayılardan oluşmalıdır!", 'status_code' => 'warning']);
        }
        if (strlen($phone_number) < 10 || strlen($phone_number) > 14){
            return response()->json(['status_message' => "Telefon Numarası 10 karakterden az ve 14 karakterden fazla olamaz!", 'status_code' => 'warning']);
        }
        #endregion

        $message = '';

        if ($request->page && $request->page == 'contact') {

            #region CHECK ---> CHECKBOX
            if (!$request->privacy_policy || $request->privacy_policy != 'on')
                return response()->json(['status_message' => 'Kullanıcı Sözleşmesini kabul etmediniz!', 'status_code' => 'error']);
                //return response()->json(['status_message' => 'Kullanıcı Sözleşmesini kabul etmediniz2', 'status_code' => 'error']);
            #endregion

            #region CHECK ---> MESSAGE
            if (!isset($request->message)) {
                return response()->json(['status_message' => 'Mesaj alanı boş bırakılamaz!', 'status_code' => 'warning']);
            }
            $message = $request->message;
            if (strlen($message) < 1 || strlen($message) > 5000) {
                return response()->json(['status_message' => "Mesaj alanı 5000 karakterden fazla olamaz!", 'status_code' => 'warning']);
            }
            #endregion
        }
        if ($request->hasFile('image')){
            $image = $this->FileUploadAndCreate($request->file('image'), 'contact-page');
        }
        else {
            $image['url'] = '';
        }

        $insert = Contact::create([
            'firstname' => $fullname,
            'email' => $email,
            'phone_number' => $phone_number,
            'message' => $message,
            'product_name' => $request->product_name ?? '',
            'image' => $image['url'],
        ])->id;
        if ($insert)
            return response()->json(['status_message' => 'İletişim bilgilerinizi aldık en kısa sürede dönüş sağlayacağız!', 'status_code' => 'success']);
        else
            return response()->json(['status_message' => 'Bir hata oluştu ve iletişim bilgilerinizi alamadık, lütfen birazdan tekrar deneyin!', 'status_code' => 'error']);
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
