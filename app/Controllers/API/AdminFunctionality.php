<?php

namespace App\Controllers\API;
use App\Controllers\BaseController;
use App\Models\Game;

/**
 * Description of AdminFunctionality
 *
 * @author justin
 */
class AdminFunctionality extends BaseController{

    public function boxtext() {
        if (session()->isAdmin) {
            $data = [
                'game_box_text' => $this->request->getVar('boxtext'),
                'uuid' => $this->request->getVar('game_uuid')
            ];
            $game = new Game();
            print_r($data);
            $game->update($data['uuid'], ['game_box_text' => $data['game_box_text']]);
            
            echo "Good to go!";
        }
    }

}
