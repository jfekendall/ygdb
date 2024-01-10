<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Market;
use App\Models\UserProfile;

class GameController extends BaseController {

    public function index($game) {

        $session = session();
        $userid = $session->get('id');
        $data = $sideBar = [];

        $profile = new UserProfile();
        $data['profile'] = $sideBar['profile'] = $profile->where('ygdb_user_uuid', $userid)->first();

        $data['username'] = $sideBar['username'] = $session->get('name');

        $y = new Systems();
        $sideBar['yourSystems'] = $y->yourSystems();

        $uid = $session->get('id');
        $u = new User();
        $data['profile'] = $sideBar['profile'] = $u->getUserProfile($uid);

        $g = new Game();
        $data['gamedata'] = $g->find($game);
        $data['gamedata'] = array_merge($data['gamedata'], $this->getThingNames('Developer', $data['gamedata']));
        $data['gamedata'] = array_merge($data['gamedata'], $this->getThingNames('Publisher', $data['gamedata']));
        $data['gamedata'] = array_merge($data['gamedata'], $this->getThingNames('Market', $data['gamedata']));
        echo view('template_start');
        echo view('page_head', $sideBar);
        echo view('game', $data);
        echo view('page_footer');
        echo view('template_end');
    }

    protected function getThingNames($thing, $game) {
        $ra = [];
        $Developer = new Developer();
        $Publisher = new Publisher();
        $Market = new Market();
        
        $lcthing = strtolower($thing);
        $limit = 4;
        if ($thing == 'Publisher'){
            $limit = 3;
        }
        for ($i = 1; $i <= $limit; $i++) {
            if (!is_null($game["game_{$i}_$lcthing"])){
            $dev = ${$thing};
                $d = $dev->find($game["game_{$i}_$lcthing"]);
                $ra["game_{$lcthing}_name_$i"] = $d["{$lcthing}_name"]; 
            }
        }
        return $ra;
    }

}
