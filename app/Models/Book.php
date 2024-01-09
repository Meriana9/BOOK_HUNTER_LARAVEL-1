<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'books_has_tags');
    }
    public function notations()
    {
        return $this->hasMany(Notation::class);
    }
}
