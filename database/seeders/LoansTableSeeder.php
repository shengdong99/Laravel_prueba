<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->insert([
            'loans_date' => '2023-01-15',
            'return_date' => '2023-02-15',
        ]);

        DB::table('loans')->insert([
            'loans_date' => '2023-02-20',
            'return_date' => '2023-03-20',
        ]);
    }
}
