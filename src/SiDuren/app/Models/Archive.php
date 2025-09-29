<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';
    protected $fillable = [
        'title',
        'letter_number',
        'file_path',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
