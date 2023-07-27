<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertEmail extends Model
{
    use HasFactory;
    protected $hidden = ['id'];
    protected $fillable = ['emails'];
}
