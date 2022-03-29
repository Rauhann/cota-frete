<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transportadoras';

    protected $fillable = [
        'nome',
    ];

    public function shippingQuotes()
    {
        return $this->hasMany(ShippingQuote::class);
    }
}
