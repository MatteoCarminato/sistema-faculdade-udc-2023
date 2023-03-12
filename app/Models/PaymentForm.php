<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class PaymentForm extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'forma_pagamento',
    ];

    protected $dates = ['deleted_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'forma_pagamento' => $this->name,
        ];
    }
}
