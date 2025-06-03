<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Measurement;
use App\Models\Specification;

class order extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
