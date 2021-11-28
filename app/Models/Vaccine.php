<?php

namespace App\Models;

use App\Models\Animals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
    protected $table = 'vaccines';
    protected $fillable = ['name', 'description', 'animals_id'];

    use SoftDeletes;

    public function cows(){
        return $this->hasMany('App\Cows', 'cows_id');
    }

    public function animals()
    {
        return $this->belongsTo(Animals::class, 'animals_id');
       
    }
}
