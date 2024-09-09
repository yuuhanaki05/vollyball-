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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
        protected $fillable = [
        'game_id',
        'player_id',
        'initial_position',
        ];
}
