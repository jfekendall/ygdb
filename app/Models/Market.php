<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of Market
 *
 * @author justin
 */
class Market extends Model {
    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $allowedFields = ['market_name'];

}
