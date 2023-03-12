<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = ['payment_term_id', 'payment_form_id'];

    public $incrementing = false;

    protected $fillable = ['payment_term_id', 'payment_form_id', 'parcela', 'dias', 'porcentual'];

    public function paymentForm()
    {
        return $this->belongsTo(PaymentForm::class);
    }

    public function paymentTerm()
    {
        return $this->belongsTo(PaymentTerm::class);
    }
}
