<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function views(){

        // za da go prebriseme imeto na foreignkey default: post_id to postId, go satavme kako vtor parametar vo hasOne methodata;//
        // isto kako vtor parametar go dodavame vo belongsTo methodata; //
        return $this->hasOne(View::class);

    }

    public function comments(){


        return  $this->hasMany(Comment::class);

    }

    
    public function categories(){


        return  $this->belongsToMany(Category::class)->withTimestamps();

    }



}

