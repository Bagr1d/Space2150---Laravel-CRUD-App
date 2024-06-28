<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipModules extends Model
{
    public $timestamps = false;

    protected $table = 'ship_modules';

    protected $primaryKey = 'id';

    protected $fillable = ['module_name','is_workable'];

    public function moduleCrew(){
        return $this->hasMany(ModuleCrew::class);
    }

    

}
