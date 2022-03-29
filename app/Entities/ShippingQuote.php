<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingQuote extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cotacao_frete';

    protected $fillable = [
        'transportadora_id',
        'uf',
        'percentual_cotacao',
        'valor_extra'
    ];

    public function shippingCompanies()
    {
        return $this->belongsTo(ShippingCompany::class, 'transportadora_id', 'id');
    }
}
