<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model {

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profile() {
        return $this->belongsTo(Customer::class,'profile_id','id');
    }

}
