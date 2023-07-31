<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function list($id)
    {
        $activitiycategories = ActivityCategory::orderBy('created_at', 'DESC')->get();
        $activities = Activity::where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(12);

        return view('front.activities.list', compact(
            'activities', 
            'activitiycategories',
            'id',
        ));
    }


    public function show($slug)
    {
        $activitiy = Activity::where('slug_uz', $slug)
        ->orWhere('slug_ru', $slug)
        ->orWhere('slug_en', $slug)
        ->first();
        

        return view('front.activities.show', compact(
            'activitiy',
      ));
    }
}
