<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function models()
    {
        return $this->belongsToMany('App\Models', 'modelFactions', 'upgrade_id');
    }
    public function restrictions()
    {
        return $this->belongsToMany('App\Restriction', 'upgradeRrestrictions', 'upgrade_id');
    }
}