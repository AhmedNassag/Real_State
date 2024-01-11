<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table   = 'cities';
    protected $guarded = [];



    //start relations
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'city_id');
    }
}
