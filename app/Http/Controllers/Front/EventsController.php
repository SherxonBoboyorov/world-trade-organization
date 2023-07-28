<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function list()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.events.list', compact('events'));
    }


    public function show($id)
    {
        $event = Event::find($id);
        return view('front.events.show', compact('event'));
    }
}
