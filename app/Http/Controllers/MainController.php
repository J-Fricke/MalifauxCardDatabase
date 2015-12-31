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
        $factions = ['All' => '', '10T' => 'Ten Thunders', 'Gremlins' => 'Gremlins'];
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

    public function getModel($id) {
        $model = $this->modelDb->getModel($id);
        $abilities = $this->modelDb->getModelAbilities($id);
        $traits = $this->modelDb->getModelTraits($id);
        $keywords = $this->modelDb->getModelKeywords($id);
        $actions = $this->modelDb->getModelActions($id);
        $factions = $this->modelDb->getModelFactions($id);
        $upgrades = $this->modelDb->getModelUpgrades($id);
        $triggers = $this->modelDb->getModelTriggers($id);
        $groups = $this->modelDb->getModelGroups($id);
        return view('model', [
            'model' => $model,
            'abilities' => $abilities,
            'traits' => $traits,
            'keywords' => $keywords,
            'actions' => $actions,
            'factions' => $factions,
            'upgrades' => $upgrades,
            'triggers' => $triggers,
            'groups' => $groups,
        ]);
    }
}