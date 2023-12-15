<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memberschedule extends Model {

    use HasFactory;

    public function profile() {
        return $this->belongsTo(Customer::class, 'profile_id', 'id');
    }

    public function class() {
        return $this->belongsTo(Gymclass::class, 'class_id', 'id');
    }

    public function trainer() {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }

}
