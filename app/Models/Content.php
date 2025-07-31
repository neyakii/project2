<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'image'
    ];

    // ✅ Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
