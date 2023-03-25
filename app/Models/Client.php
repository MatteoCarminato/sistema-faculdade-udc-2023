<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name',
        'nickname',
        'birth_date',
        'phone',
        'phone_home',
        'email',
        'rg',
        'cpf',
        'sex',
        'type',
        'blood_types',
        'height',
        'weight',
        'school',
        'shift',
        'address',
        'city_id',
        'zip_code',
        'number',
        'complements',
        'district',
        'active'
    ];

    protected $dates = ['deleted_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nickname' => $this->nickname,
        ];
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}