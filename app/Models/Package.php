<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model {

    use HasFactory;

    public function plan() {
        return $this->belongsTo(Singledata::class, 'plan_id', 'id');
    }

    public function equipment() {
        return $this->belongsTo(Singledata::class, 'equipment_id', 'id');
    }

}
