<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateActivityCategory;
use App\Http\Requests\Admin\UpdateActivityCategory;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitycategories = ActivityCategory::orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.activitycategory.index', compact('activitycategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activitycategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateActivityCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivityCategory $request)
    {
        $data = $request->all();

        if (ActivityCategory::create($data)) {
            return redirect()->route('activitycategory.index')->with('message', 'Created successfully');
        }
        return redirect()->route('activitycategory.index')->back()->with('message', 'Error creating');
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
        $activitycategory = ActivityCategory::find($id);
        return view('admin.activitycategory.edit', compact('activitycategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateActivityCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityCategory $request, $id)
    {
        $activitycategory = ActivityCategory::find($id);

        $data = $request->all();


        if ($activitycategory->update($data)) {
            return redirect()->route('activitycategory.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('activitycategory.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ActivityCategory::find($id)) {
            return redirect()->route('activitycategory.index')->with('message', "Activity category not found");
        }

        $activitycategory = ActivityCategory::find($id);

        if ($activitycategory->delete()) {
            return redirect()->route('activitycategory.index')->with('message', "Activity category deleted successfully");
        }
        return redirect()->route('activitycategory.index')->with('message', "unable to delete Activity category");
    }
}
