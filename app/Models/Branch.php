<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table   = 'branches';
    protected $guarded = [];



    //start relations
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
