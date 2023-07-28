<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() 
    {
        $pages = About::all();
        {
            return view('front.about', compact('pages'));
        }
    }
}
