<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\System;
use App\Models\Market;
use App\Models\Game;
use Ramsey\Uuid\Uuid;

class WiiGames extends Migration {

    protected $systemid = 0;
    
    public function up() {
        $this->db->query("DELETE FROM ygdb_games WHERE system_id = '0'");
        $this->db->query("DELETE FROM ygdb_systems WHERE system_name = 'Nintendo Wii'");
        //Add the system
        $system = new System();
        $data = ['system_name' => "Nintendo Wii",
            'system_banner' => "/img/banners/wii.jpg",
            'system_debut' => '2006-11-19',
            'system_end' => '2020-07-09'];
        $system->save($data);

        $this->systemid = $system->insertID();

        //Add the games
        $row = 0;
        $colmap = [];
        if (($handle = fopen(__DIR__ . "/wii_games.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                if ($row == 0) {
                    $colmap = $data;
                    $row++;
                    continue;
                }
                $mapped = [];
                $i = 0;
                foreach ($data AS $k => $v) {
                    $mapped[$colmap[$i]] = $v;
                    $i++;
                }

                /*
                  (
                  [Title] => The $1,000,000 Pyramid
                  [Developer] => Ludia
                  [Publisher] => Ubisoft
                  [First released] => 2011-03-08NA
                  [Japan] => Unreleased
                  [North America] => March 8, 2011
                  [APAC] => Unreleased
                  [EU] => Unreleased
                  )
                 */
                $uuid = Uuid::uuid4();
                $g = [
                    'uuid' => $uuid->toString(),
                    'system_id' => "{$this->systemid}",
                    'release_date' => substr($mapped['First released'], 0, 10)
                ];
                $g = array_merge($g, $this->iterateFields($mapped['Title'], 'title'));
                $g = array_merge($g, $this->iterateFields($mapped['Developer'], 'developer'));
                $g = array_merge($g, $this->iterateFields($mapped['Publisher'], 'publisher'));
                //Release date has to match market. Otherwise, whats the point?
                $g = array_merge($g, $this->marketToReleaseDate($mapped));
                
                //Save the game
                $game = new Game();
                print_r($g);
                $game->save($g);
            }
            fclose($handle);
        }
    }

    public function down() {
        $system = new System();
        $to_remove = $system->where(['system_name' => 'Nintendo Wii'])->first();
        
        $this->db->query("DELETE FROM ygdb_games WHERE system_id = {$to_remove['id']}");
        $system->where(['system_name' => 'Nintendo Wii'])->delete();
    }

    protected function iterateFields($field, $game_whatever_field): Array {
        $a = [];
        $j = 1;
        foreach (explode("\n", $field) AS $d) {
            foreach (explode(",", $d) AS $e) {

                if (in_array(ucwords($game_whatever_field), ['Developer', 'Publisher'])) {
                    $e = $this->makeThing(ucwords($game_whatever_field), $e);
                }
                $a["game_{$j}_{$game_whatever_field}"] = $e;
                $j++;
            }
        }
        return $a;
    }

    protected function marketToReleaseDate($game): Array {
        $m = $r = $a = [];
        $i = 1;
        foreach (['Japan', 'North America', 'APAC', 'EU'] AS $market) {
            if ($game[$market] == 'Unreleased') {
                continue;
            }
            $mid = new Market();
            $theMarket = $mid->where(['market_name' => $market])->first();

            $m["game_{$i}_market"] = $theMarket['id'];
            $r["game_{$i}_release_date"] = date('Y-m-d', strtotime($game[$market]));
            $i++;
        }
        $a = array_merge($a, $m);
        $a = array_merge($a, $r);
        return $a;
    }

    public function makeThing($thing, $name): int {
        //see if it exists
        if ($thing == 'Developer') {
            $obj = new Developer();
        } else if ($thing == 'Publisher') {
            $obj = new Publisher();
        }
        $exists = $obj->where([$obj->nameColumn => $name])->first();

        if (!empty($exists)) {
            return $exists['id'];
        }

        //... if not... make it
        $obj->save([$obj->nameColumn => $name]);
        $thething = $obj->where([$obj->nameColumn => $name])->first();
        return $thething['id'];
    }

}
