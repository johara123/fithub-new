<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewcorner extends Model {

    use HasFactory;

    protected $table = "member_reviews";

    public function member() {
        return $this->belongsTo(Customer::class, 'member_id', 'id');
    }

}
