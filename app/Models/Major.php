<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = "program_studi";

    protected $guarded = [];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'fakultas_id');
    }

    public function student() {
        return $this->hasMany(Student::class, 'program_studi_id');
    }
}
