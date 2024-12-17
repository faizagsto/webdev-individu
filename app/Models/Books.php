<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category_id',
    ];

    protected $with = ['category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
