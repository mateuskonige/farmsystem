<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cow extends Model
{
    protected $table = 'cows';
    protected $fillable = ['name', 'date', 'description', 'color', 'number', 'vaccine_id'];
    protected $guarded = array();

    use SoftDeletes;

    public function getCreatedAtAttribute($date)
    {
        Carbon::setLocale('pt-BR');
        return Carbon::parse($date)->format('d M, Y');
    }

    public function vaccines(){
        return $this->belongsToMany('App\Vaccines', 'vaccines_id')->latest();
    }

}
