<?php

namespace App\Controllers;

use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Market;
use App\Models\System;
use League\Csv\Writer;

/**
 * Class CSVExport
 *
 * Exports data about a user's collection to csv
 * 
 * @author justin
 */
class CSVExport extends BaseController {

    protected $map = [
        'have' => 'Have',
        'uuid' => '',
        'system_id' => 'System Name', //Only exported with the whole shebang
        'game_1_title' => 'Title 1',
        'game_2_title' => 'Title 2',
        'game_3_title' => 'Title 3',
        'game_1_publisher' => 'Publisher 1',
        'game_2_publisher' => 'Publisher 2',
        'game_3_publisher' => 'Publisher 3',
        'game_1_developer' => 'Developer 1',
        'game_2_developer' => 'Developer 2',
        'game_3_developer' => 'Developer 3',
        'game_4_developer' => 'Developer 4',
        'game_1_market' => 'Market 1',
        'game_2_market' => 'Market 2',
        'game_3_market' => 'Market 3',
        'game_4_market' => 'Market 4',
        'game_genre' => '',
        'game_1_release_date' => 'Release Date 1',
        'game_2_release_date' => 'Release Date 2',
        'game_3_release_date' => 'Release Date 3',
        'game_4_release_date' => 'Release Date 4',
        'game_box_art' => '',
        'game_box_text' => ''
    ];
    protected $systemFields = [
        'Have',
        'Title 1',
        'Title 2',
        'Title 3',
        'Publisher 1',
        'Publisher 2',
        'Publisher 3',
        'Developer 1',
        'Developer 2',
        'Developer 3',
        'Developer 4',
        'Market 1',
        'Market 2',
        'Market 3',
        'Market 4',
        'Release Date 1',
        'Release Date 2',
        'Release Date 3',
        'Release Date 4'];
    protected $collectionFields = [
        'Have',
        'System',
        'Title 1',
        'Title 2',
        'Title 3',
        'Publisher 1',
        'Publisher 2',
        'Publisher 3',
        'Developer 1',
        'Developer 2',
        'Developer 3',
        'Developer 4',
        'Market 1',
        'Market 2',
        'Market 3',
        'Market 4',
        'Release Date 1',
        'Release Date 2',
        'Release Date 3',
        'Release Date 4'];

    /**
     * Method index
     * 
     * @author Justin Kendall
     * @param string system
     * @return void
     */
    public function index(string $system = ''): void {
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        if (!empty($system)) {
            //Export for one system   
            //put the header in 
            $csv->insertOne($this->systemFields);
            $systemName = str_replace(' ', '_', $system);
            $fileName = "{$this->data['username']}-{$systemName}.csv";

            $systemCollection = new AssembleCollection();
            $collection = $systemCollection->allGamesOnSystem($system);
            foreach ($collection AS $c) {
                $record = [];
                $this->getThingNames('Developer', $c);
                $this->getThingNames('Publisher', $c);
                $this->getThingNames('Market', $c);
                foreach ($this->map as $k => $m) {
                    if (empty($m) || $m == 'system_id') {
                        unset($c[$k]);
                    } else {
                        $record[$m] = $c[$k];
                    }
                }
                $csv->insertOne($record);
            }
        } else {
            //Dump the whole collection
            $s = new System();
            //put the header in 
            $csv->insertOne($this->systemFields);
            $fileName = "{$this->data['username']}-Collection.csv";

            $systemCollection = new AssembleCollection();
            $collection = $systemCollection->getWholeCollection($this->uid);
            foreach ($collection AS $c) {

                $record = [];
                $this->getThingNames('Developer', $c);
                $this->getThingNames('Publisher', $c);
                $this->getThingNames('Market', $c);

                $c['system_id'] = $s->translateToEnglish($c['system_id']);

                foreach ($this->map as $k => $m) {
                    if (empty($m)) {
                        unset($c[$k]);
                    } else {
                        $record[$m] = $c[$k];
                    }
                }
                $csv->insertOne($record);
            }
        }
        $csv->output($fileName);
        die();
    }

    /**
     * Method getThingNames
     * 
     * Translates normalized FKs to human readable
     * 
     * @author Justin Kendall
     * @param string thing
     * @param array game
     * @return void
     * @todo find a less hacky way of instantiating things
     * @todo use translateToEnglish on Models
     */
    protected function getThingNames(string $thing, array &$game): void {
        $ra = [];
        $Developer = new Developer();
        $Publisher = new Publisher();
        $Market = new Market();

        $lcthing = strtolower($thing);
        $limit = 4;
        if ($thing == 'Publisher') {
            $limit = 3;
        }
        for ($i = 1; $i <= $limit; $i++) {
            if (!is_null($game["game_{$i}_$lcthing"])) {
                $dev = ${$thing};
                $d = $dev->find($game["game_{$i}_$lcthing"]);
                if ($thing != 'Market') {
                    $game["game_{$i}_$lcthing"] = $d["{$lcthing}_name"];
                } else {
                    $game["game_{$i}_$lcthing"] = lang('Market.' . $d["{$lcthing}_name"]);
                }
            }
        }
    }

}
