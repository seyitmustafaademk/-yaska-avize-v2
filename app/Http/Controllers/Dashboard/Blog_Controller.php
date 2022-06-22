<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Blog_Controller extends Controller
{
    public function ShowPage()
    {
        $data = [
            '__title' => 'Add Content',

        ];

        return view('dashboard.blog.add-content', $data);
    }
}
