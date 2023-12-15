<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dietchart extends Model {

    use HasFactory;

    public function member() {
        return $this->belongsTo(Customer::class, 'member_id', 'id');
    }

    public function dietplan() {
        return $this->belongsTo(Singledata::class, 'diet_plan_id', 'id');
    }

}
