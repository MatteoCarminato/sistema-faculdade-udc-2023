<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name'
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
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
