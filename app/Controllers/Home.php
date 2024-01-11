<?php

namespace App\Controllers;

use App\Models\Collection;

class Home extends BaseController {
    /**
     * Method index
     * 
     * @author Justin Kendall
     * @return void
     */
    public function index(): void {
        if ($this->session->get('isLoggedIn')) {
            $c = new AssembleCollection();
            $this->data['collections'] = $c->assembleAll($this->uid);

            $col = new Collection();
            $howmany = $col->amountOfCollections($this->uid);
            $this->data['howmany'] = $howmany;

            echo view('template_start');
            echo view('page_head', $this->sideBar);
            echo view('dashboard', $this->data);
            echo view('page_footer');
            echo view('template_end');
        } else {
            echo view('template_start');
            echo view('login');
            echo view('template_end');
        }
    }

}
