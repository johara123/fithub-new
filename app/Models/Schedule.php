<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {

    use HasFactory;

    public function class() {
        return $this->belongsTo(Gymclass::class, 'class_id', 'id');
    }

    public function trainer() {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }

}
