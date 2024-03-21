<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'El Gran Gastby',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'pages' => 300,
            'curso' => '2A PRIMARIA',
            'asignatura' => 'lengua',

        ]);

        DB::table('books')->insert([
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Marquez',
            'published_year' => 1967,
            'pages' => 400,
            'curso' => '4A PRIMARIA',
            'asignatura' => 'filosofia',

        ]);
    }
}
