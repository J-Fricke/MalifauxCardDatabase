<?php

namespace app\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Models;
use App\Models\Faction;

class ModelsRepository
{

    protected $table = 'models';

    public function getFactions() {
        return Faction::all();
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
        if (is_numeric($id)) {
            return $this->getModelById($id);
        } else {
            return $this->getModelBySlug($id);
        }
    }

    public function getModelAbilities(Models $model)
    {
        return $model->abilities()->get();
    }
    public function getModelFactions(Models $model)
    {
        return $model->factions()->get();
    }
    public function getModelActions(Models $model)
    {
        return $model->actions()->get();
    }
    public function getModelKeywords(Models $model)
    {
        return $model->keywords()->get();
    }
    public function getModelTraits(Models $model)
    {
        return $model->traits()->get();
    }
    public function getModelUpgrades(Models $model)
    {
        return $model->upgrades()->get();
    }
    public function getModelGroups(Models $model)
    {
        return $model->groups()->get();
    }
    public function getModelTriggers(Models $model)
    {
        return $model->triggers()->get();
    }

    public function getModelById($id)
    {
        return Models::where('id', $id)->get();
    }
    public function getModelBySlug($slug)
    {
        return Models::where('name', $slug)->get();
    }

    public function getAllModels()
    {
        return Models::all();
    }

    /**
     * @param $trait
     * @param $faction
     * @return mixed
     */
    private function getFactionModelsByTrait($trait, $faction)
    {
        $modelsQuery = Models::whereHas('traits', function ($query) use ($trait) {
            $query->where('trait', '=', $trait);
        });
        if ($faction) {
            $modelsQuery->whereHas('factions', function ($query) use ($faction) {
                $query->where('faction', '=', $faction);
            });
        }
        $models = json_decode($modelsQuery->get()->toJSON());

        return $models;
    }

    public function getModelData($id)
    {
        $model = Models::find($id);
        $returnModel = [];
        $returnModel['id'] = $id;
        $returnModel['model'][0] = $model->toArray();
        $returnModel = $this->getModelDataPieces($model, $returnModel);

        return $returnModel;
    }

    /**
     * @param $model
     * @param $returnModel
     * @return mixed
     */
    private function getModelDataPieces($model, $returnModel)
    {
        $modelInfo = ['abilities' => 'ability', 'traits' => 'trait', 'keywords' => 'keyword', 'actions' => 'action', 'factions' => 'faction', 'upgrades' => 'upgrade', 'triggers' => 'trigger', 'groups' => 'group'];
        foreach ($modelInfo as $method => $name) {
            $returnModel[$method] = $model->$method()->select($method . '.id', $method . '.' . $name)->get()->toArray();
        }
        return $returnModel;
    }
}