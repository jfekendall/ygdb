<?php

namespace App\Controllers\API;

use App\Models\Collection;
use App\Controllers\BaseController;

/**
 * Class GameCollectionCRUD
 * 
 * CRUD functionality for games to and from a collection
 * 
 * @author Justin Kendall
 */
class GameCollectionCRUD extends BaseController {

    /**
     * Method Add
     * 
     * Adds game to a collection
     * @return void
     */
    public function add(): void {
        $sgli_uuid = $this->request->getVar('li');

        $c = new Collection();
        $data = [
            'game_uuid' => $sgli_uuid,
            'user_uuid' => $this->uid
        ];
        $c->save($data);
        echo lang("General.game_added");
    }

    /**
     * Method Remove
     * 
     * Removes a game from a collection
     * @return void
     */
    public function remove(): void {
        $c = new Collection();
        $sgli_uuid = $this->request->getVar('li');
        $c->where('game_uuid', $sgli_uuid)->where('user_uuid', $this->uid)->delete();
        echo lang("General.game_removed");
    }

    /**
     * Method stats
     * 
     * Updates personal stats of a game in a users collection
     * @return void
     */
    public function stats(): void {
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
            echo lang('PersonalStats.save_success');
        } else {
            echo lang('PersonalStats.save_fail');
        }
    }

}
