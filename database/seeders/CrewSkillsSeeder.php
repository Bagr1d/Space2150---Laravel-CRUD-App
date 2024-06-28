<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\CrewSkills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrewSkillsSeeder extends Seeder
{
    public function run(){
        DB::table('crew_skills')->insert([
            ['module_crew_id'=>1, 'name'=>'mechanic'], 
            ['module_crew_id'=>2, 'name'=>'navigator'], 
            ['module_crew_id'=>3, 'name'=>'biologist'], 
            ['module_crew_id'=>4, 'name'=>'cook'], 
        ]);
    }
}
