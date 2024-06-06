<?php

namespace Database\Seeders;

use App\Models\catatan;
use Illuminate\Database\Seeder;

class catatanSeeder extends Seeder
{




    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        catatan::table('catatans')->insert([
            'name' => 'Pemeliharaan Komputer dan Jaringan',
            'short_name' => 'BAPPEDA',
        ]);
        catatan::table('catatans')->insert([
            'name' => 'Tatalaksana Studio Produksi',
            'short_name' => 'DINSOS',
        ]);
        catatan::table('catatans')->insert([
            'name' => 'Dinas ',
            'short_name' => 'DINKES',
            
        ]);
    }
}
