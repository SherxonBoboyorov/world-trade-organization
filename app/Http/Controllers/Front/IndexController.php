<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\ActivityCategory;
use App\Models\Admin\Event;
use App\Models\Admin\News;
use App\Models\Admin\Team;
use App\Models\Article;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homepage() 
    {

        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        $pages = Page::all();
        // $teams = Team::orderBy('created_at', 'DESC')->paginate(8);
        $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
        // $events = Event::orderBy('created_at', 'DESC')->paginate(3);
        // $avtivitycategories = ActivityCategory::all();
        // $activities = Activity::orderBy('created_at', 'DESC')->get();

        return view('front.index', compact(
            'sliders',
            'pages',
            'articles',
            
        ));
    }
}
