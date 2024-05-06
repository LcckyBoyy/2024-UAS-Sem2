<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Menu::orderBy('updated_at', 'desc')->get();
        return view('home', ['data'=>$data]);
    }
}
