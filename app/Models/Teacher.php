<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Teacher extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name', 
        'email', 
        'cref',
        'phone'
    ];

    protected $dates = ['deleted_at'];
    protected $guarded = ['deleted_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ];
    }
}
