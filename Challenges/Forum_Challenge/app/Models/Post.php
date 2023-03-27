<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'user_id',
        'discussion_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function discussion(){

        return $this->belongsTo(Discussion::class);
    }


}
