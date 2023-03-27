<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Bonus;
use App\Models\Title;
use App\Models\Project;
use App\Models\Tracker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function bonus(){
        return $this->hasOne(Bonus::class);
    }

    public function title(){
        return $this->hasOne(Title::class);
    }
    
    public function trackers(){
        return $this->hasMany(Tracker::class);
    }
   
    public function projects(){
        return $this->hasMany(Project::class);
    }
    









}
