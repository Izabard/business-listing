<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'The lord of the ring 1'],
            ['title' => 'The lord of the ring 2'],
            ['title' => 'The lord of the ring 3']
        ];

        foreach ($items as $item) {
            \App\Models\Book::factory()->create($item);
        }
    }
}
