<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function contractor(){
        return $this->belongsTo(Contractors::class);
    }
}
