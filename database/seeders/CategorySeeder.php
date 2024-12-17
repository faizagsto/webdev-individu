<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert categories into the database
        DB::table('categories')->insert([
            ['category' => 'Fiction'],
            ['category' => 'Non-Fiction'],
            ['category' => 'Science'],
            ['category' => 'History'],
            ['category' => 'Fantasy'],
            ['category' => 'Biography'],
        ]);
    }
}
