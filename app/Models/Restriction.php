<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function upgrades()
    {
        return $this->belongsToMany('App\Upgrade', 'upgradeRestrictions', 'restriction_id');
    }
}