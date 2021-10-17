<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud2 extends Model
{
    protected $table='crud2s';
    protected $fillable=['name','email','cpass'];
}
