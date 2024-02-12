<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $fillable = ['id','pic', 'header', 'description','location', 'datetime'];
    public function registeredEvents()
{
    return $this->hasMany(Events::class);
}

}

