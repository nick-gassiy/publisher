<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreements extends Model
{
    use HasFactory;

    public function tariff(){
        return $this->belongsTo(Tariffs::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

}
