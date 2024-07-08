<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'people',
        'payment',
        'status',
        'amount',
        'user_id',
        'table_id',
        'time_order',
        'fullname',
        'phone'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->code = self::generateRandomCode();
        });
    }

    public static function generateRandomCode($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
