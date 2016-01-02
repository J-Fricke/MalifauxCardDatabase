<?php

namespace app\Repositories;

use Illuminate\Support\Facades\DB;

class ModelsRepository
{

    protected $table = 'models';

    public function getFactions() {
        return DB::table('factions')->select('*')->get();
    }
    public function getFactionMasters($faction) {
        return $this->getFactionModelsByTrait('master', $faction);
    }

    public function getFactionHenchmen($faction) {
        return $this->getFactionModelsByTrait('henchman', $faction);
    }

    public function getFactionTotems($faction) {
        return $this->getFactionModelsByTrait('totem', $faction);
    }

    public function getFactionEnforcers($faction) {
        return $this->getFactionModelsByTrait('enforcer', $faction);
    }

    public function getFactionMinions($faction) {
        return $this->getFactionModelsByTrait('minion', $faction);
    }

    public function getFactionPeons($faction) {
        return $this->getFactionModelsByTrait('peon', $faction);
    }

    public function getModel($id)
    {
        return DB::table($this->table)->select($this->table . '.*')->
        where($this->table.'.id', '=', $id)->
        get();
    }

    public function getModelAbilities($id)
    {
        return $this->getModelDataPiece($id, 'abilities', 'modelAbilities');
    }
    public function getModelFactions($id)
    {
        return $this->getModelDataPiece($id, 'factions', 'modelFactions');
    }
    public function getModelActions($id)
    {
        return $this->getModelDataPiece($id, 'actions', 'modelActions');
    }
    public function getModelKeywords($id)
    {
        return $this->getModelDataPiece($id, 'keywords', 'modelKeywords');
    }
    public function getModelTraits($id)
    {
        return $this->getModelDataPiece($id, 'traits', 'modelTraits');
    }
    public function getModelUpgrades($id)
    {
        return $this->getModelDataPiece($id, 'upgrades', 'modelUpgrades');
    }
    public function getModelGroups($id)
    {
        return $this->getModelDataPiece($id, 'groups', 'modelGroups');
    }
    public function getModelTriggers($id)
    {
        return $this->getModelDataPiece($id, 'triggers', 'modelTriggers');
    }

    public function getMaster($id) {
        if (is_numeric($id)) {
            return $this->getMasterById($id);
        } else {
            return $this->getMasterBySlug($id);
        }
    }
    public function getMasterById($id)
    {
        return DB::table($this->table)->select('*')->where('program_id', '=', $id)->get();
    }
    public function getMasterBySlug($slug)
    {
        return DB::table($this->table)->select('*')->where('slug', '=', $slug)->get();
    }

    /**
     * @param $trait
     * @param $faction
     * @return mixed
     */
    private function getFactionModelsByTrait($trait, $faction)
    {
        $dbCall = DB::table($this->table)->select($this->table . '.*')->leftJoin('modelFactions', $this->table.'.id', '=', 'modelFactions.model_id')->leftJoin('factions', 'modelFactions.faction_id', '=', 'factions.id')->leftJoin('modelAbilities', $this->table . '.id', '=', 'modelAbilities.model_id')->leftJoin('modelActions', $this->table . '.id', '=', 'modelActions.model_id')->leftJoin('modelGroups', $this->table . '.id', '=', 'modelGroups.model_id')->leftJoin('modelKeywords', $this->table . '.id', '=', 'modelKeywords.model_id')->join('modelTraits', $this->table . '.id', '=', 'modelTraits.model_id')->join('traits', 'modelTraits.trait_id', '=', 'traits.id')->leftJoin('modelTriggers', $this->table . '.id', '=', 'modelTriggers.model_id')->where('traits.trait', '=', $trait);
        if ($faction) {
            $dbCall->where('factions.faction', '=', $faction);
        }

        return $dbCall->get();
    }

    /**
     * @param $id
     * @param $table
     * @param $joinTable
     * @return mixed
     */
    private function getModelDataPiece($id, $table, $joinTable)
    {
        return DB::table($table)->select($table . '.*')->leftJoin($joinTable, $table . '.id', '=', $joinTable . '.model_id')->where($joinTable . '.model_id', '=', $id)->get();
    }
}