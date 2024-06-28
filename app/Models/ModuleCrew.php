<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleCrew extends Model
{
    public $timestamps = false;

    protected $table = 'module_crew';

    protected $primaryKey = 'id';

    protected $fillable = ['ship_module_id','nick','gender','age'];

    public function crewSkills(){
        return $this->hasMany(CrewSkills::class);
    }

    public function moduleCrew()
    {
        return $this->belongsTo(ShipModules::class, 'ship_module_id', 'id');
    }

}
