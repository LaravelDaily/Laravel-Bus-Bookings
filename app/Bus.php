<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Bus extends Model
{
    use SoftDeletes;

    public $table = 'buses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'places_available',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getSelectNameAttribute()
    {
        return $this->name . ' (' . $this->places_available . ' ' . \Str::plural('place', $this->places_available) . ')';
    }
}
