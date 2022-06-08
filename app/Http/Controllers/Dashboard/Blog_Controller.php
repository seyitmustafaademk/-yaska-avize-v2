<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Blog_Controller extends Controller
{
    public function ShowPage(Request $request)
    {
        $data = [
            '__title' => 'Add Content',

        ];

        return view('dashboard.blog.add-content', $data);
    }

    public function InsertPost(Request $request)
    {
        return $request->all();
    }
}
