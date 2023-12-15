<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gainloss extends Model {

    use HasFactory;

    protected $table = 'gainlosses';
    protected $primaryKey = 'id';

    public function profile() {
        return $this->belongsTo(Customer::class, 'profile_id', 'id');
    }

}
