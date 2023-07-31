<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateEvent;
use App\Http\Requests\Admin\UpdateEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateEvent  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEvent $request)
    {
        $data = $request->all();

        $data['image'] = Event::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Event::create($data)) {
            return redirect()->route('event.index')->with('message', "Event created seccessfully");
        }
        return redirect()->route('event.index')->with('message', "unable to created Event");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \IlApp\Http\Requests\Admin\UpdateEvent  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent $request, $id)
    {
        if (!Event::find($id)) {
            return redirect()->route('event.index')->with('message', "Event not fount");
        }

        $event = Event::find($id);

        $data = $request->all();
        $data['image'] = Event::updateImage($request, $event);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($event->update($data)) {
            return redirect()->route('event.index')->with('message', "Event changed successfully");
        }
        return redirect()->route('event.index')->with('message', "Unable to update Event");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Event::find($id)) {
            return redirect()->route('event.index')->with('message', "Event not found");
        }

        $event = Event::find($id);

        if (File::exists(public_path() . $event->image)) {
            File::delete(public_path() . $event->image);
        }

        if ($event->delete()) {
            return redirect()->route('event.index')->with('message', "Event deleted successfully");
        }
        return redirect()->route('event.index')->with('message', "unable to delete Event");
    }
}
