<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = "fakultas";

    protected $guarded = [];

    public function major() {
        return $this->hasMany(Major::class, 'fakultas_id');
    }

    public function student() {
        return $this->hasMany(Student::class, 'fakultas_id');
    }
}
