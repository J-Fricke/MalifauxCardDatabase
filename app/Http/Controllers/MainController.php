<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function __construct()
    {

    }

    public function getIndex()
    {
        $factions = ['All' => '', '10T' => 'Ten Thunders', 'Gremlins' => 'Gremlins'];
        $masters = $factions;
        $henchmen = [];
        $totems = [];
        $enforcers = [];
        $minions = [];
        $peons = [];
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
}