<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class GroupHour extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = ['weekday', 'hour', 'year', 'teacher_id', 'locals_id', 'groups_id'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
          ];
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function locals()
    {
        return $this->belongsTo(Locals::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'groups_id');
    }
    
}
