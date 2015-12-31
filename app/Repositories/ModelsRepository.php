<?php

namespace app\Repositories;

use Illuminate\Support\Facades\DB;

class ModelsRepository
{

    protected $table = 'models';

    public function getMasters() {
        return $this->getModelsByTrait('master');
    }

    public function getHenchmen() {
        return $this->getModelsByTrait('henchman');
    }

    public function getTotems() {
        return $this->getModelsByTrait('totem');
    }

    public function getEnforcers() {
        return $this->getModelsByTrait('enforcer');
    }

    public function getMinions() {
        return $this->getModelsByTrait('minino');
    }

    public function getPeons() {
        return $this->getModelsByTrait('peon');
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
     * @return mixed
     */
    private function getModelsByTrait($trait)
    {
        return DB::table($this->table)->select($this->table . '.*')->leftJoin('modelAbilities', $this->table . '.id', '=', 'modelAbilities.model_id')->leftJoin('modelActions', $this->table . '.id', '=', 'modelActions.model_id')->leftJoin('modelGroups', $this->table . '.id', '=', 'modelGroups.model_id')->leftJoin('modelKeywords', $this->table . '.id', '=', 'modelKeywords.model_id')->join('modelTraits', $this->table . '.id', '=', 'modelTraits.model_id')->join('traits', 'modelTraits.trait_id', '=', 'traits.id')->leftJoin('modelTriggers', $this->table . '.id', '=', 'modelTriggers.model_id')->where('traits.trait', '=', $trait)->get();
    }
}