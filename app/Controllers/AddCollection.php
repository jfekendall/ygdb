<?php

namespace App\Controllers;
use App\Models\Collection;
use App\Models\GameSystem;
use App\Models\UserProfile;
use CodeIgniter\Controller;

class AddCollection extends BaseController
{
    public function index() {
		$session = session();
		$userid = $session->get('id');
		$profile = new UserProfile();
		$sideBar['profile'] = $profile->where('ygdb_user_uuid', $userid)->first();
		
		$sideBar['username'] = $session->get('name');
		$c = new AssembleCollection();

                
                $y = new Systems();
                
                $sideBar['yourSystems'] = $y->yourSystems();
                $s = new GameSystem();
                $systems['sys'] = $s->orderBy('system_name', 'ASC')->findAll();
                
	        echo view('template_start');
		echo view('page_head',  $sideBar);
	    	echo view('systems_list', $systems);
		echo view('page_footer');
	    	echo view('template_end');

    }
}
