<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            'psikologi',
            'sastra',
            'agama',
            'teknik',
            'kedokteran',
            'ekonomi',
            'hukum',
            'sosiologi',
            'ilmu komputer'
        ];

        foreach($faculties as $row) {
            Faculty::create([
                'nama' => $row
            ]);
        }
    }
}
