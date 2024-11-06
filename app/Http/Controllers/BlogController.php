<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        return view('blog.home');
    }
    public function test()
    {
        $title=Tournament::find(1);
        return $title;
    }
}
