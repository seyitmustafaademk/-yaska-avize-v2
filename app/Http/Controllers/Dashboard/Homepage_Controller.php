<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homepage_Controller extends Controller
{
    public function ShowPage()
    {
        $data = [
            '__title' => 'Dashboard',
        ];
        return view('dashboard.homepage', $data);
    }
}
