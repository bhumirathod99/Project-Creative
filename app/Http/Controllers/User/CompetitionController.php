<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectCompetition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = ProjectCompetition::with(['project'])->get();
        return view('user.competitions.index',compact('competitions'));
    }

    public function create($id)
    {
        $project = Project::where('id',Crypt::decryptString($id))->with(['competitions'])->first();
        return view('user.competitions.create',compact('project'));
    }

    public function store(Request $request)
    {
        $competition = new ProjectCompetition($request->all());
        $competition->user_id = auth()->id();
       $competition->save();
        return redirect()->back()->with('message','Competition Created Successfully');
    }

    public function show($id)
    {
        $competition = ProjectCompetition::where('id',Crypt::decryptString($id))->with(['project'])->first();
        return view('user.competitions.show',compact('competition'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(ProjectCompetition $competition)
    {
        $competition->delete();
        return redirect()->back()->with('message','Competition successfully Deleted');
    }
}
