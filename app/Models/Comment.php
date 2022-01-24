<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['post_id','content'];


    use HasFactory;
    public function blogPost()
    {
        return $this->belongsTo(Blogpost::class,'post_id');
    }
}
