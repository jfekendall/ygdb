<?php

namespace App\Controllers;

use App\Models\Collection;
use App\Models\UserProfile;
use App\Models\GameSystem;
use CodeIgniter\Controller;

class ManageCollection extends BaseController {

    public function index($system) {

        $c = new AssembleCollection();
        $this->data['allGames'] = $c->allGamesOnSystem($system);

        $this->data['system'] = $system;

        $s = new GameSystem();
        $this->data['system_info'] = $s->where('system_name', $system)->first();

        echo view('template_start');
        echo view('page_head', $this->sideBar);
        echo view('manage_collection', $this->data);
        echo view('page_footer');
        echo view('template_end');
    }

}
