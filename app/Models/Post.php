<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'preview_image',
        'main_image'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}








