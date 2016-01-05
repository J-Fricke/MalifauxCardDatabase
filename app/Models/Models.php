<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Models extends Model
{
    use AlgoliaEloquentTrait;

    public $timestamps = false;
    public $table = 'models';
    protected $hidden = ['pivot'];

    public function factions()
    {
        return $this->belongsToMany('App\Models\Faction', 'modelFactions', 'model_id', 'faction_id');
    }
    public function traits()
    {
        return $this->belongsToMany('App\Models\Traits', 'modelTraits', 'model_id', 'trait_id');
    }
    public function triggers()
    {
        return $this->belongsToMany('App\Models\Trigger', 'modelTriggers', 'model_id', 'trigger_id');
    }
    public function keywords()
    {
        return $this->belongsToMany('App\Models\Keyword', 'modelKeywords', 'model_id', 'keyword_id');
    }
    public function abilities()
    {
        return $this->belongsToMany('App\Models\Abilities', 'modelAbilities', 'model_id', 'ability_id');
    }
    public function actions()
    {
        return $this->belongsToMany('App\Models\Action', 'modelActions', 'model_id', 'action_id');
    }
    public function upgrades()
    {
        return $this->belongsToMany('App\Models\Upgrade', 'modelUpgrades', 'model_id', 'upgrade_id');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'modelGroups', 'model_id', 'group_id');
    }
}