<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Market;
use App\Models\Collection;

class GameController extends BaseController {

    /**
     * Method index
     * 
     * @author Justin Kendall
     * @param string game
     * @return void
     */
    public function index(string $game): void {
        $g = new Game();
        $this->data['gamedata'] = $g->find($game);
        $this->data['gamedata'] = array_merge($this->data['gamedata'], $this->getThingNames('Developer', $this->data['gamedata']));
        $this->data['gamedata'] = array_merge($this->data['gamedata'], $this->getThingNames('Publisher', $this->data['gamedata']));
        $this->data['gamedata'] = array_merge($this->data['gamedata'], $this->getThingNames('Market', $this->data['gamedata']));

        $collectionData = new Collection();

        $this->data['personalstats'] = $collectionData->where([
                    'game_uuid' => $this->data['gamedata']['uuid'],
                    'user_uuid' => $this->uid
                ])->first();

        echo view('template_start');
        echo view('page_head', $this->sideBar);
        echo view('game', $this->data);
        echo view('page_footer');
        echo view('template_end');
    }

    /**
     * Method getThingNames
     * 
     * Translates normalized FKs to human readable
     * 
     * @author Justin Kendall
     * @param string thing
     * @param array game
     * @return array
     * @todo find a less hacky way of instantiating things
     */
    protected function getThingNames(string $thing, array $game): array {
        $ra = [];
        $Developer = new Developer();
        $Publisher = new Publisher();
        $Market = new Market();

        $lcthing = strtolower($thing);
        $limit = 4;
        if ($thing == 'Publisher') {
            $limit = 3;
        }
        for ($i = 1; $i <= $limit; $i++) {
            if (!is_null($game["game_{$i}_$lcthing"])) {
                $dev = ${$thing};
                $d = $dev->find($game["game_{$i}_$lcthing"]);
                $ra["game_{$lcthing}_name_$i"] = $d["{$lcthing}_name"];
            }
        }
        return $ra;
    }

}
