<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractors extends Model
{
    use HasFactory;

    public function supplies(){
        return $this->hasMany(Supplies::class,'contractor_id');
    }
}
