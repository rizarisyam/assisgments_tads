<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            'akuntasi',
            'bisnis',
            'ilmu ekonomi',
            'manajemen',
            'perbankan',
            'ekonomi pembangunan',
            'teknik informatika',
            'bisnis digital',
            'kewirausahaan'
        ];

        foreach($majors as $row) {
            Major::create([
                'nama' => $row,
                'fakultas_id' => rand(1, 9)
            ]);
        }
    }
}
