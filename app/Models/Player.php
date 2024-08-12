<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    
    public function positions()   
    {
        return $this->hasMany(Position::class);  
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    protected $fillable = [
    'user_id',
    'name',
    'position'
    ];
    
}
