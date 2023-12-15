<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workoutsummary extends Model {

    use HasFactory;

    protected $table = 'workout_summaries';
    protected $primaryKey = 'id';

    public function profile() {
        return $this->belongsTo(Customer::class, 'profile_id', 'id');
    }

}
