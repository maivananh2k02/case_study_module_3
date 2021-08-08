<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    public $primaryKey = 'id';

    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }
}
