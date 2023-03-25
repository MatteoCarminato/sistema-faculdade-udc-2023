<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentChild extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_id', 'parent_id', 'type', 'financial_guardian'];

    public function parent()
    {
        return $this->belongsTo(Client::class, 'parent_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
