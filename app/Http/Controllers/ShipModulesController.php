<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipModules;
use App\Models\ModuleCrew;

class ShipModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // read all Ship Modules
        $myShipModules = ShipModules::all();
        // return view with ship_modules parameters
        return view('shipmodules.list', ['ship_modules' => $myShipModules]);
    }

    public function showCrewMembers(string $moduleName)
    {
        // Znajdź moduł po nazwie
        $shipModule = ShipModules::where('module_name', $moduleName)->first();

        if ($shipModule === null) {
            $error_message = "Ship module '$moduleName' not found";
            return view('shipmodules.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }

        // Pobierz załogantów przypisanych do tego modułu
        $crewMembers = ModuleCrew::where('ship_module_id', $shipModule->id)->get();

        return view('shipmodules.crew', ['shipModule' => $shipModule, 'crewMembers' => $crewMembers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create new form to add ship module
        return view('shipmodules.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules',
            'is_workable' => 'required',
        ]);

        if($validated){
            $mod_ship = new ShipModules();
            $mod_ship->module_name = $request->module_name;
            $mod_ship->is_workable = $request->is_workable;
            $mod_ship->save();

            return redirect('/shipmodules/list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myShipModule = ShipModules::find($id);

        if($myShipModule == null){
            $error_message = "Ship module id=$id not find";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myShipModule->count() > 0)
            return view('shipmodules.show',['shipmodule'=>$myShipModule]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myShipModule = ShipModules::find($id);
        if($myShipModule == null){
            $error_message = "Ship module id= ".$id." not find";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myShipModule->count() > 0)
            return view('shipmodules.edit',['shipmodule'=>$myShipModule]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules',
            'is_workable' => 'required',
        ]);

        if($validated){
            $mod_ship = ShipModules::find($id);

            if($mod_ship != null){
                $mod_ship->module_name = $request->module_name;
                $mod_ship->is_workable = $request->is_workable;
                $mod_ship->save();

                return redirect('/shipmodules/list');
            }
            else{
                $error_message = "Ship module id=$id not find";
                return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mod_ship = ShipModules::find($id);

        if($mod_ship != null){
            $crewMembersCount = ModuleCrew::where('ship_module_id', $mod_ship->id)->count();

            if ($crewMembersCount > 0) {
                $error_message = "Cannot delete the ship module because it has assigned crew members.";
                return view('shipmodules.message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }
            
            $mod_ship->delete();
            return redirect('/shipmodules/list');
        }
        else{
            $error_message = "Delete ship module id=$id not find";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
