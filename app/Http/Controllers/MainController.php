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

    /**
     * @param $id
     * @return array
     */
    private function getModelData($id)
    {
        $model = $this->modelDb->getModel($id);
        $abilities = $this->modelDb->getModelAbilities($id);
        $traits = $this->modelDb->getModelTraits($id);
        $keywords = $this->modelDb->getModelKeywords($id);
        $actions = $this->modelDb->getModelActions($id);
        $factions = $this->modelDb->getModelFactions($id);
        $upgrades = $this->modelDb->getModelUpgrades($id);
        $triggers = $this->modelDb->getModelTriggers($id);
        $groups = $this->modelDb->getModelGroups($id);
        return ['id' => $id, 'model' => $model, 'abilities' => $abilities, 'traits' => $traits, 'keywords' => $keywords, 'actions' => $actions, 'factions' => $factions, 'upgrades' => $upgrades, 'triggers' => $triggers, 'groups' => $groups];
    }

    private function getFactionModels()
    {
        $factions = $this->modelDb->getFactions();
        $allFactions = new \stdClass();
        $allFactions->id = 0;
        $allFactions->faction = 'All';
        $allFactions->models = $this->getModelsGroupedByTrait();
        foreach ($factions as $id => $faction) {
            $factions[$id]->models = $this->getModelsGroupedByTrait($faction->faction);
        }
        array_unshift($factions, $allFactions);

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