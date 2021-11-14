<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'amount', 'size', 'price'
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function formatMoney(): string
    {
        return '$' . $this->price / 100;
    }
}
