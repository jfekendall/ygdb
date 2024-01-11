<?php

namespace App\Controllers;

use App\Models\Collection;
use App\Models\Game;
use App\Models\Market;
use App\Models\GameSystem;
use CodeIgniter\Controller;

class AssembleCollection extends BaseController {

    public function assembleAll() {

        $userCollection = [];

        $collection = new Collection();
        $li = new Game();
        foreach ($collection->getCollectionsByUser($this->uid) AS $coll) {

            foreach ($li->where('uuid', $coll['game_uuid'])->find() AS $line) {

                $s = new GameSystem();
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

    public function allGamesOnSystem($system) {
        $s = new GameSystem();
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

}
