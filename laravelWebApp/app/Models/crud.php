<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $table='cruds';
    protected $fillable=['name','email','pass1','pass2'];
}
