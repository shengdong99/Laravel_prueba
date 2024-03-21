<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'pages', 'curso', 'asignatura','author', 'author_id'];

    public function author(){
        return  $this->belongsTo(Author::class);
    }

    public function loans(){
        return $this->hasMany(Loans::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    
}
