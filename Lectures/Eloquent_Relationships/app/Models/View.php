<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    public function post()
    {

        // sekogas vo tabelata vo koja imame foreignkey ja povikuvame belongsTo methodata;//

        return $this->belongsTo(Post::class);
    }
}
