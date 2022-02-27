<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'umi andriani',
            'labuh budiyanto',
            'panji saefullah',
            'rini haryanti',
            'pia usada',
            'kani fujianti',
            'nalar utama',
            'eman prakasa',
            'umaya prasasta',
            'umi uyainah'
        ];

        foreach($names as $row) {
            Student::create([
                'nama' => $row,
                'alamat' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum aliquam dolores perspiciatis veritatis quo nobis qui sunt quasi voluptatem eveniet porro quia odio, esse necessitatibus numquam assumenda unde dolorem ex.',
                'no_telp' => '082323445323',
                'fakultas_id' => rand(1, 9),
                'program_studi_id' => rand(1, 9)
            ]);
        }
    }
}
