<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakfast extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'time',
        'date',
    ];


}
