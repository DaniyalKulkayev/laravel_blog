<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $table = 'categories'; // Здесь явно указывается модели юзать таблицу categories, хотя laravel автоматически это распознает
    // protected $guarded = false;
    protected $fillable = [
        'id',
        'title'
    ];
}
