<?php

namespace App\Controllers;
use App\Models\Collection;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index() {
	if ( session()->get('isLoggedIn')){
                $data = [];
                $session = session();
                $data['username'] = $sideBar['username'] = $session->get('name');
                $uid = $session->get('id');
                
		
                $c = new AssembleCollection();
		$data['collections'] = $c->assembleAll($uid);	
                
                $col = new Collection();
                $howmany = $col->amountOfCollections($uid);
                $data['howmany'] = $howmany;
                
                $y = new Systems();
                $sideBar['yourSystems'] = $y->yourSystems();
                
                $u = new User();
                $data['profile'] = $sideBar['profile'] = $u->getUserProfile($uid);

	        echo view('template_start');
		echo view('page_head',  $sideBar);
	    	echo view('dashboard', $data);
		echo view('page_footer');
	    	echo view('template_end');
	}else{
		echo view('template_start');
	    	echo view('login');
	    	echo view('template_end');
	}
    }
}
