<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTeam;
use App\Http\Requests\Admin\UpdateTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateTeam  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeam $request)
    {
        $data = $request->all();

        $data['image'] = Team::uploadImage($request);

        if (Team::create($data)) {
            return redirect()->route('team.index')->with('message', "Team created seccessfully");
        }
        return redirect()->route('team.index')->with('message', "unable to created team");
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
        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateTeam  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeam $request, $id)
    {
        if (!Team::find($id)) {
            return redirect()->route('team.index')->with('message', "Team not fount");
        }

        $team = Team::find($id);

        $data = $request->all();
        $data['image'] = Team::updateImage($request, $team);

        if ($team->update($data)) {
            return redirect()->route('team.index')->with('message', "Team changed successfully");
        }
        return redirect()->route('team.index')->with('message', "Unable to update Team");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Team::find($id)) {
            return redirect()->route('team.index')->with('message', "Team not found");
        }

        $team = Team::find($id);

        if (File::exists(public_path() . $team->image)) {
            File::delete(public_path() . $team->image);
        }

        if ($team->delete()) {
            return redirect()->route('team.index')->with('message', "Team deleted successfully");
        }
        return redirect()->route('team.index')->with('message', "unable to delete Team");
    }
}
