<?php

namespace App\Controllers;

use App\Models\System;

class ManageCollection extends BaseController {
/**
     * Method index
     * 
     * @author Justin Kendall
     * @return void
     */
    public function index($system): void {

        $c = new AssembleCollection();
        $this->data['allGames'] = $c->allGamesOnSystem($system);

        $this->data['system'] = $system;

        $s = new System();
        $this->data['system_info'] = $s->where('system_name', $system)->first();

        echo view('template_start');
        echo view('page_head', $this->sideBar);
        echo view('manage_collection', $this->data);
        echo view('page_footer');
        echo view('template_end');
    }

}
