<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\ShipModules;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipModulesSeeder extends Seeder{
    public function run(){
        DB::table('ship_modules')->insert([
            ['module_name'=>'engines', 'is_workable' =>true], 
            ['module_name'=>'lights', 'is_workable' =>true], 
            ['module_name'=>'air_condition', 'is_workable' =>false], 
        ]);
    }
}
