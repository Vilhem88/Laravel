<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function employees(){
        return $this->belongsToMany(Employee::class);
    }


    public function client(){
        return $this->belongsTo(Client::class);
    }





}
