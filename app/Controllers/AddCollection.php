<?php

namespace App\Controllers;

use App\Models\GameSystem;

class AddCollection extends BaseController {

    public function index(): void {
        $s = new GameSystem();
        $systems['sys'] = $s->orderBy('system_name', 'ASC')->findAll();

        echo view('template_start');
        echo view('page_head', $this->sideBar);
        echo view('systems_list', $systems);
        echo view('page_footer');
        echo view('template_end');
    }

}
