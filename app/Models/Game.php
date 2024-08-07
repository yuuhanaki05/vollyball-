<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
     use HasFactory;
     
    public function sets()   
    {
        return $this->hasMany(Set::class);  
    }
    
    public function positions()   
    {
        return $this->hasMany(Position::class);  
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}