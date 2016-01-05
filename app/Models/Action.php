<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function models()
    {
        return $this->belongsToMany('App\Models', 'modelFactions', 'action_id');
    }
}