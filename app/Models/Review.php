<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'content',
        'food_id',
        'user_id'
    ];

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
