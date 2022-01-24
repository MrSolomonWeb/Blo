<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{

    protected $fillable=['title','content','user_id'];
    use HasFactory;

    public function comment()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
