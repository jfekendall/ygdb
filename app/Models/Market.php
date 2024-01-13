<?php

namespace App\Models;


/**
 * Description of Market
 *
 * @author justin
 */
class Market extends BaseModel {
    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $allowedFields = ['market_name'];

}
