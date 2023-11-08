<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable =
     [
        'nickname',
        'rank',
        'role',
        'age',
        'description'
    ];

    public static function currentPlayer($field,$player)
    {
        $currentPlayer = Player::where($field,$player)->first();
        return $currentPlayer;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
