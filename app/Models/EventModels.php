<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModels extends Model {
    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $allowedFields = ["title", "description", "gambar"];
}

?>