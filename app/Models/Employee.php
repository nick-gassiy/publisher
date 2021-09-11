<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }

    public function position(){
        return $this->hasOne(Positions::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
