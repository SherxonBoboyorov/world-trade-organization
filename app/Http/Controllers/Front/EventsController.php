<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function list()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.events.list', compact('events'));
    }


    public function show($slug)
    {
        $event = Event::where('slug_uz', $slug)
        ->orWhere('slug_ru', $slug)
        ->orWhere('slug_en', $slug)
        ->first();
        return view('front.events.show', compact('event'));
    }
}
