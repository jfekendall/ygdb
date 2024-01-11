<?php


namespace App\Controllers;

/**
 * Description of Systems
 *
 * @author justin
 */
class Systems extends BaseController{
    
    public function yourSystems(){
        $db = \Config\Database::connect();
        $builder = $db->table('ygdb_collections');
        $builder->select('system_name');
        $builder->join('ygdb_games', 'game_uuid = ygdb_games.uuid');
        $builder->join('ygdb_systems', 'system_id = ygdb_systems.id');
        $builder->where('user_uuid', session()->get('id'));
        $builder->groupBy('system_id');
        $query = $builder->get();
        return $query->getResult('array');
    }
}
