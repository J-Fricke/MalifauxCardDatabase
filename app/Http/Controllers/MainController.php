<?php

namespace App\Http\Controllers;

use App\Repositories\ModelsRepository;

class MainController extends Controller
{
    protected $modelDb;

    public function __construct(ModelsRepository $modelsRepository)
    {
        $this->modelDb = $modelsRepository;
    }

    public function getIndex()
    {
        $factionModels = $this->getFactionModels();
        return view('index', ['factions' => $factionModels]);
    }

    public function getModel($id)
    {
        return view('model', $this->getModelData($id));
    }

    public function getModelModal($id)
    {
        return view('modelModal', $this->getModelData($id));
    }
    public function getSearch()
    {
        return view('search', ['searchAppKey' => env('ALGOLIA_APP_ID'), 'searchApiKey' => env('ALGOLIA_API_KEY')]);
    }

    public function getUpdateIndex()
    {
        $models = $this->modelDb->getAllModels();
        foreach ($models as $model) {
            $model->factions = $this->modelDb->getModelFactions($model);
            $model->abilities = $this->modelDb->getModelAbilities($model);
            $model->traits = $this->modelDb->getModelTraits($model);
            $model->keywords = $this->modelDb->getModelKeywords($model);
            $model->actions = $this->modelDb->getModelActions($model);
            $model->upgrades = $this->modelDb->getModelUpgrades($model);
            $model->triggers = $this->modelDb->getModelTriggers($model);
            $model->groups = $this->modelDb->getModelGroups($model);
            $model->pushToIndex();
        }
        return redirect('/');
    }

    /**
     * @param $id
     * @return array
     */
    private function getModelData($id)
    {
        return $this->modelDb->getModelData($id);
    }

    private function getFactionModels()
    {
        $factionsCollection = $this->modelDb->getFactions();
        $allFactions = new \stdClass();
        $allFactions->id = 0;
        $allFactions->faction = 'All';
        $allFactions->models = $this->getModelsGroupedByTrait();
        $factions = [];
        $factions[0] = $allFactions;
        foreach ($factionsCollection as $id => $faction) {
            $factions[$id+1] = $faction;
            $factions[$id+1]->models = $this->getModelsGroupedByTrait($faction->faction);
        }

        return $factions;
    }
    private function getModelsGroupedByTrait($faction = false)
    {
        return [
            'masters' => $this->modelDb->getFactionMasters($faction),
            'henchmen' => $this->modelDb->getFactionHenchmen($faction),
            'totems' => $this->modelDb->getFactionTotems($faction),
            'enforcers' => $this->modelDb->getFactionEnforcers($faction),
            'minions' =>$this->modelDb->getFactionMinions($faction),
            'peons' => $this->modelDb->getFactionPeons($faction)
        ];
    }
}