<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table   = 'areas';
    protected $guarded = [];



    //start relations
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'area_id');
    }
}
