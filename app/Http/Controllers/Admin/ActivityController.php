<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateActivity;
use App\Http\Requests\Admin\UpdateActivity;
use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.activity.index', [
            'activities' => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activitycategories = ActivityCategory::all();
        return view('admin.activity.create', compact('activitycategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateActivity  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivity $request)
    {
        $data = $request->all();

        $data['image'] = Activity::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Activity::create($data)) {
            return redirect()->route('activity.index')->with('message', "Activity created seccessfully");
        }
        return redirect()->route('activity.index')->with('message', "unable to created Activity");
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
    public function edit(Activity $activity)
    {
        $activitycategory = ActivityCategory::all();
        return view('admin.activity.edit', [
            'activitycategory' => $activitycategory,
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateActivity  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivity $request, $id)
    {
        if (!Activity::find($id)) {
            return redirect()->route('activity.index')->with('message', "Activity not fount");
        }

        $activity = Activity::find($id);

        $data = $request->all();
        $data['image'] = Activity::updateImage($request, $activity);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($activity->update($data)) {
            return redirect()->route('activity.index')->with('message', "Activity changed successfully");
        }
        return redirect()->route('activity.index')->with('message', "Unable to update Activity");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Activity::find($id)) {
            return redirect()->route('activity.index')->with('message', "Activity not found");
        }

        $activity = Activity::find($id);

        if (File::exists(public_path() . $activity->image)) {
            File::delete(public_path() . $activity->image);
        }

        if ($activity->delete()) {
            return redirect()->route('activity.index')->with('message', "Activity deleted successfully");
        }
        return redirect()->route('activity.index')->with('message', "unable to delete Activity");
    }
}
