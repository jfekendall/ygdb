<?php

namespace App\Controllers;

use App\Models\Collection;
use App\Models\Game;
use App\Models\Market;
use App\Models\System;

class AssembleCollection extends BaseController {

    /**
     * Method assembleAll
     * 
     * The getter for all games in a collection
     * 
     * @author Justin Kendall
     * @param string uid
     * @return array
     */
    public function assembleAll(string $uid): array {

        $userCollection = [];

        $collection = new Collection();
        $li = new Game();
        foreach ($collection->getCollectionsByUser($uid) AS $coll) {

            foreach ($li->where('uuid', $coll['game_uuid'])->find() AS $line) {

                $s = new System();
                $system = $s->find($line['system_id']);
                $game = $line;
                $userCollection[$system['system_name']][$game['game_1_title']]['uuid'] = $game['uuid'];
                $userCollection[$system['system_name']][$game['game_1_title']]['status'] = $coll['status'];
                $userCollection[$system['system_name']][$game['game_1_title']]['stats'] = [
                    'with_case' => $coll['with_case'],
                    'in_wrap' => $coll['in_wrap'],
                    'with_manual' => $coll['with_manual']
                ];
            }
        }
        ksort($userCollection);
        return $userCollection;
    }

    /**
     * Method allGamesOnSystem
     * 
     * Returns all games belonging to a system
     * 
     * @author Justin Kendall
     * @param string system
     * @return array
     */
    public function allGamesOnSystem($system): array {
        $s = new System();
        $system = $s->where('system_name', $system)->first();
        $li = new Game();
        $ra = [];
        $iterator = 0;
        foreach ($li->where('system_id', $system['id'])->orderBy('game_1_title')->findAll() AS $game) {
            $ra[$iterator] = $game;
            $m = new Market();
            $collection = new Collection();
            $ra[$iterator]['have'] = false;
            $market = $title = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($game["game_{$i}_market"]) {
                    $mark = $m->find($game["game_{$i}_market"]);
                    $market[] = $mark['market_name'];
                }
                if ($game["game_{$i}_title"]) {
                    if (!in_array($game["game_{$i}_title"], $title)) {
                        $title[] = $game["game_{$i}_title"];
                    }
                }
            }
            $ra[$iterator]['market_1'] = implode('<br>', $market);
            $ra[$iterator]['game_1_title'] = implode('<br>', $title);

            if ($collection->hasGame($game['uuid'], session()->get('id'))) {
                $ra[$iterator]['have'] = true;
            }
            $iterator++;
        }
        return $ra;
    }
    
        /**
     * Method getWholeCollection
     * 
     * Returns all systems with games belonging to a user
     * 
     * @author Justin Kendall
     * @param string uid
     * @return array
     */
    public function getWholeCollection(string $uid): array {
        $ra = [];
        $systems = [];
        $collection = new Collection();
        $system = new System();
        foreach($collection->where(['user_uuid' => $uid])->findAll() AS $c){
            $game = new Game();
            $g =  $game->find($c['game_uuid']);
            
            $systems[$g['system_id']] = $system->translateToEnglish($g['system_id']);
        }
        
        foreach($systems AS $s){
            $ra = array_merge($ra, $this->allGamesOnSystem($s));
        }
        
        return $ra;
        
    }
    

}
