<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traits extends Model
{
    public $timestamps = false;
    public $table = 'traits';
    protected $hidden = ['pivot'];

    public function models()
    {
        return $this->belongsToMany('App\Models', 'modelTratis', 'trait_id');
    }
}