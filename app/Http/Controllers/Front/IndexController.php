<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\Article;
use App\Models\Event;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homepage() 
    {

        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        $pages = Page::all();
        $teams = Team::orderBy('created_at', 'DESC')->paginate(8);
        $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
        $events = Event::orderBy('created_at', 'DESC')->paginate(3);
        $avtivitycategories = ActivityCategory::all();
        $activities = Activity::orderBy('created_at', 'DESC')->get();

        return view('front.index', compact(
            'sliders',
            'pages',
            'articles',
            'teams',
            'events',
            'avtivitycategories',
            'activities',
        
        ));
    }
}
