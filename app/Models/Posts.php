<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url_clean',
        'content',
        'user_id',
        'categories_id',
        'posted',
    ];


    public function category()
    {
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function image(){
       return $this->hasOne(PostImage::class, 'post_id', 'id');
    }

}
