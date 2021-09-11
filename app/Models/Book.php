<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function genre(){
        return $this->belongsTo(Genres::class);
    }

    public function supply(){
        return $this->hasOne(Supplies::class,'book_id');
    }
}
