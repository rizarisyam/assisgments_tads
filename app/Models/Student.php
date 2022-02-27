<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $guarded = [];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'fakultas_id');
    }

    public function major() {
        return $this->belongsTo(Major::class, 'program_studi_id');
    }
}
