<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddContent_Controller extends Controller
{

    public function ShowPage()
    {
        $categories = PostCategory::all();
        $data = [
            '__title' => 'Add Content',
            'categories' => $categories,
        ];
        return view('dashboard.blog.add-content', $data);
    }

    public function InsertPost(Request $request)
    {
        try {
//            return $request->all();
            $title = $request->title;
            $category_id = $request->category_id;
            $description = $request->summernote;
            $slug = Str::slug($request->title);

            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');
            $now_date = Carbon::now();

            $first = false;
            $first_image = null;
            foreach ($images as $k => $img) {

                try {
                    $data = $img->getAttribute('src');
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);

                    $data = base64_decode($data);
                    $image_name = Str::slug(microtime(true) . "-$k-$title");
                    $image_path = "uploads\blog-content\\" . Str::slug($now_date . '-' . strtolower($title)) . "\\$image_name.png";

                    if (!$first){
                        $first = true;
                        $first_image = $image_path;
                    }
                    Storage::disk('public_folder')->put($image_path, $data);

                    $image_path = str_replace('\\', '/', $image_path);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset($image_path));
                }catch (\Exception $exception){
                }
            }

            $description = $dom->saveHTML();

            Post::create([
                'title' => $title,
                'category_id' => $category_id,
                'content' => $description,
                'slug' => $slug,
                'image' => $first_image,
            ]);

            return redirect()->route('admin.blog.add-content');
        } catch (\Exception $exception){
            return redirect()->route('admin.blog.add-content');
        }
    }
}
