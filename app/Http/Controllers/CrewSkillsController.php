<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewSkills;
use App\Models\ModuleCrew;


class CrewSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myCrewSkills = CrewSkills::all();
        return view('crewskills.list', ['crew_skills' => $myCrewSkills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ModuleCrew = ModuleCrew::all();
        return view('crewskills.add', ['ModuleCrew' => $ModuleCrew]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_crew_id' => 'required',
            'name' => 'required|min:3|max:25|unique:crew_skills',
        ]);

        if($validated){
            $crew_skill = new CrewSkills();
            $crew_skill->module_crew_id = $request->module_crew_id;
            $crew_skill->name = $request->name;
            $crew_skill->save();

            return redirect('/crewskills/list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myCrewSkills = CrewSkills::find($id);

        if($myCrewSkills == null){
            $error_message = "crew skill id=$id not find";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myCrewSkills->count() > 0)
            return view('crewskills.show',['crewskill'=>$myCrewSkills]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myCrewSkills = CrewSkills::find($id);
        if($myCrewSkills == null){
            $error_message = "crew skill id= ".$id." not find";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myCrewSkills->count() > 0)
            return view('crewskills.edit',['crewskill'=>$myCrewSkills]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50|unique:crew_skills',
        ]);

        if($validated){
            $crew_skill = CrewSkills::find($id);

            if($crew_skill != null){
                $crew_skill->name = $request->name;
                $crew_skill->save();

                return redirect('/crewskills/list');
            }
            else{
                $error_message = "Crew skill id=$id not find";
                return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crew_skill = CrewSkills::find($id);

        if($crew_skill != null){
            $crew_skill->delete();
            return redirect('/crewskills/list');
        }
        else{
            $error_message = "Delete crew skill id=$id not find";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
