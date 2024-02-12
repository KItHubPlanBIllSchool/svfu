<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistredUserEvents extends Model
{
    public $timestamps = false;
    protected $registredusers = 'registreduserevents';
    protected $fillable = ['user_id', 'event_id'];
}
