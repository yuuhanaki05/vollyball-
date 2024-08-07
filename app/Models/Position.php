<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
