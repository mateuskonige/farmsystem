<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    protected $table = 'animals';
    protected $fillable = ['class'];
    protected $guarded = array();

    public function vaccine()
    {
        return $this->hasMany('App\Models\Vaccine');
    }
}
