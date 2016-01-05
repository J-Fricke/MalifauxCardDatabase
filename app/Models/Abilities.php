<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abilities extends Model
{
    protected $table = 'abilities';
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function models()
    {
        return $this->belongsToMany('App\Models', 'modelFactions', 'ability_id');
    }
}