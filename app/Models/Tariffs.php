<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model
{
    use HasFactory;

    public function agreement(){
        return $this->belongsTo(Agreements::class);
    }
}
