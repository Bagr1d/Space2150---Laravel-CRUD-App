<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleCrew;
use App\Models\CrewSkills;
use App\Models\ShipModules;

class ModuleCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myModuleCrew = ModuleCrew::all();
        return view('modulecrews.list', ['module_crews' => $myModuleCrew]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipModules = ShipModules::all();
        return view('modulecrews.add', ['shipModules' => $shipModules]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:25|unique:module_crew',
            'gender' => 'required',
            'age' => 'required',
        ]);

        if($validated){
            $mod_crew = new ModuleCrew();
            $mod_crew->ship_module_id = $request->ship_module_id;
            $mod_crew->nick = $request->nick;
            $mod_crew->gender = $request->gender;
            $mod_crew->age = $request->age;
            $mod_crew->save();

            return redirect('/modulecrews/list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myModuleCrew = ModuleCrew::find($id);

        if($myModuleCrew == null){
            $error_message = "Module Crew id=$id not find";
            return view('modulecrews.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myModuleCrew->count() > 0)
            return view('modulecrews.show',['modulecrew'=>$myModuleCrew]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shipModules = ShipModules::all();
        $myModuleCrew = ModuleCrew::find($id);
        if($myModuleCrew == null){
            $error_message = "Module Crew id= ".$id." not find";
            return view('modulecrews.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myModuleCrew->count() > 0)
            return view('modulecrews.edit',['modulecrew'=>$myModuleCrew, 'shipModules' => $shipModules]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:25|unique:module_crew',
            'gender' => 'required',
            'age' => 'required',
        ]);

        if($validated){
            $mod_crew = ModuleCrew::find($id);

            if($mod_crew != null){
                $mod_crew->ship_module_id = $request->ship_module_id;
                $mod_crew->nick = $request->nick;
                $mod_crew->gender = $request->gender;
                $mod_crew->age = $request->age;
                $mod_crew->save();

                return redirect('/modulecrews/list');
            }
            else{
                $error_message = "Module crew id=$id not find";
                return view('modulecrews.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mod_crew = ModuleCrew::find($id);

        if($mod_crew != null){
            $crewSkillsCount = CrewSkills::where('module_crew_id', $mod_crew->id)->count();

            if ($crewSkillsCount > 0) {
                $error_message = "Cannot delete the crew member because it has assigned skills.";
                return view('shipmodules.message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }

            $mod_crew->delete();
            return redirect('/modulecrews/list');
        }
        else{
            $error_message = "Delete module crew id=$id not find";
            return view('modulecrews.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
