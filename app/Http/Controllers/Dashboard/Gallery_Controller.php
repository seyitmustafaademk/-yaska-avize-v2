<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class Gallery_Controller extends Controller
{
    public function ShowPage()
    {
        $gallery = Gallery::all();
//        return $gallery;

        $data = [
            '__title' => 'Galeri',
            'gallery' => $gallery,
        ];

        return view('dashboard.gallery', $data);
    }

    public function AddGalleryItem(Request $request)
    {
        $primary_status = $this->FileUploadAndCreate($request->primary_image, 'gallery');

        $created = Gallery::create(
            [
                'media_url' => $primary_status['url'],
                'media_type' => $primary_status['type'],
            ]
        );

        return redirect()->route('admin.gallery');
    }

    public function DeleteGalleryItem($id)
    {
        try {
            $image = Gallery::where('id', '=', $id)->get()[0];
            \File::delete(public_path($image->media_url));
            $image = Gallery::where('id', '=', $id)->delete();

            return redirect()->route('admin.gallery');
        } catch (\Exception $exception){
            return redirect()->route('admin.gallery');
        }
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
