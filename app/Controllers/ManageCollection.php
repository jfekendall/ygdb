<?php

namespace App\Controllers;
use App\Models\Collection;
use App\Models\UserProfile;
use App\Models\GameSystem;
use CodeIgniter\Controller;

class ManageCollection extends BaseController
{
    public function index($system) {

		$session = session();
		$userid = $session->get('id');
                $data = $sideBar = [];
                
		$profile = new UserProfile();
		$data['profile'] = $sideBar['profile'] = $profile->where('ygdb_user_uuid', $userid)->first();
		
		$data['username'] = $sideBar['username'] = $session->get('name');

		$c = new AssembleCollection();
		$data['allGames'] = $c->allGamesOnSystem($system);

		$data['system'] = $system;
                $y = new Systems();
                $sideBar['yourSystems'] = $y->yourSystems();
                
                $s = new GameSystem();
                $data['system_info'] = $s->where('system_name', $system)->first();
                
	        echo view('template_start');
		echo view('page_head', $sideBar);
	    	echo view('manage_collection', $data);
		echo view('page_footer');
	    	echo view('template_end');

    }
}
