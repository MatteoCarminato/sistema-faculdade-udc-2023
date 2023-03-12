<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class PaymentTerm extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'condicao_pagamento',
        'multa',
        'juro',
        'desconto',
        'qtd_parcelas',
    ];

    protected $dates = ['deleted_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'condicao_pagamento' => $this->name,
        ];
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
