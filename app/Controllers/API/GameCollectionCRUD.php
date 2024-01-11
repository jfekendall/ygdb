<?php

namespace App\Controllers\API;

use App\Models\Collection;
use App\Controllers\BaseController;

class GameCollectionCRUD extends BaseController {

    public function add() {
        $sgli_uuid = $this->request->getVar('li');

        $c = new Collection();
        $data = [
            'game_uuid' => $sgli_uuid,
            'user_uuid' => $this->uid
        ];
        $c->save($data);
    }

    public function remove() {
        $c = new Collection();
        $sgli_uuid = $this->request->getVar('li');
        $c->where('game_uuid', $sgli_uuid)->where('user_uuid', $this->uid)->delete();
    }

    public function stats() {
        //get the sent stuff
        $field = $this->request->getVar('field');
        $pieces = explode('_', $field);

        $game_uuid = $pieces[0];
        if (sizeof($pieces) > 2) {
            $field_name = "{$pieces[1]}_{$pieces[2]}";
        } else {
            $field_name = $pieces[1];
        }
        $status = $this->request->getVar('status');

        $c = new Collection();
        $id = $c->where('game_uuid', $game_uuid)
                        ->where('user_uuid', $this->uid)->first();

        if ($c->update($id['id'], [$field_name => $status])) {
            echo 'Success';
        } else {
            echo 'Bummer';
        }
    }

}
