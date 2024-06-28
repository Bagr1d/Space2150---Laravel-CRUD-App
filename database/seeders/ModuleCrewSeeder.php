<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\ModuleCrew;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleCrewSeeder extends Seeder
{
    public function run(){
        DB::table('module_crew')->insert([
            ['ship_module_id'=>1, 'nick'=>'Bob', 'gender'=>'M', 'age'=>43], 
            ['ship_module_id'=>1, 'nick'=>'Marry', 'gender'=>'F', 'age'=>35], 
            ['ship_module_id'=>2, 'nick'=>'Tom', 'gender'=>'M', 'age'=>32], 
            ['ship_module_id'=>3, 'nick'=>'Mark', 'gender'=>'M', 'age'=>29], 
        ]);
    }
}
