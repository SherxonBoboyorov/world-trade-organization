<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function list()
    {
        $teams = Team::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.our-team.list', compact('teams'));
    }


    public function show($id)
    {
        $team = Team::find($id);

        return view('front.our-team.show', compact('team'));
    }
}
