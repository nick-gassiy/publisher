<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 'Администратор';
    const EMPLOYEE = 'Сотрудник';
    const CLIENT = 'Клиент';

    public function user(){
        return $this->belongsToMany(User::class,'user_roles');
    }
}
