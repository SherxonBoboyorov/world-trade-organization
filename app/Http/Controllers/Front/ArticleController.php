<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list()
    {
        $articles = News::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.news.list', compact('articles'));
    }


    public function show($id)
    {
        $article = News::find($id);
        return view('front.news.show', compact('article'));
    }
}
