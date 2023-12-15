<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packagerecord extends Model {

    use HasFactory;

    public function profile() {
        return $this->belongsTo(Customer::class, 'profile_id', 'id');
    }

}
