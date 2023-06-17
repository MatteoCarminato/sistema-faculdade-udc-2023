<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Contract extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'client_id',
        'resp_id',
        'group_id',
        'payment_term_id',
        'status',
        'monthly_fee',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function responsible()
    {
        return $this->belongsTo(Client::class, 'resp_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function paymentForm()
    {
        return $this->belongsTo(PaymentTerm::class, 'payment_term_id');
    }

}
