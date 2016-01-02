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
        $factions = $this->getFactions();
        $masters = $this->modelDb->getMasters();
        $henchmen = $this->modelDb->getHenchmen();
        $totems = $this->modelDb->getTotems();
        $enforcers = $this->modelDb->getEnforcers();
        $minions = $this->modelDb->getMinions();
        $peons = $this->modelDb->getPeons();
//        dd($masters);
        return view('index', [
                'factions' => $factions,
                'factionsSelect' => array_keys($factions),
                'masters' => $masters,
                'mastersSelect' => array_keys($masters),
                'henchmen' => $henchmen,
                'totems' => $totems,
                'enforcers' => $enforcers,
                'minions' => $minions,
                'peons' => $peons,
            ]
        );
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

    private function getFactions()
    {
        $factionsBase = $this->modelDb->getFactions();
        $allFactions = new \stdClass();
        $allFactions->id = '';
        $allFactions->faction = 'All';
        array_unshift($factionsBase, $allFactions);

        return $factionsBase;
    }
}