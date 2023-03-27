<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(Type::class);
    }

    
    public function rating(){
        return $this->belongsTo(Rating::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'genre    _movies');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class, 'actor_movies');
    }

    public function directors(){
        return $this->belongsToMany(Director::class, 'director_movies');
    }





}
