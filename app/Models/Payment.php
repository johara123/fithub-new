<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    use HasFactory;

    protected $table = 'paymnets';
    protected $primaryKey = 'id';

    public function profile() {
        return $this->belongsTo(Customer::class, 'profile_id', 'id');
    }

}
