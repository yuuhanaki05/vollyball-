<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
     use HasFactory;
     
    public function game()   
    {
        return $this->belongsTo(Game::class);  
    }
    
     public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
        protected $fillable = [
        'game_id',
        'set_index',
        'our_points',
        'opponent_points'
        ];
}
