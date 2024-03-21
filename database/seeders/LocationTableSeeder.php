<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('location')->insert([
            'sala' => 'Sala 1',
            'street' => 'Calle Principal 123',
            'sede' => 'Sede Central',
            'city' => 'Ciudad Principal',
        ]);

        DB::table('location')->insert([
            'sala' => 'Sala 2',
            'street' => 'Avenida Secundaria 456',
            'sede' => 'Sede Secundaria',
            'city' => 'Ciudad Secundaria',
        ]);
    }
}
