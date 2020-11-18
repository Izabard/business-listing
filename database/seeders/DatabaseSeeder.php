<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $items = [
             ['id' => 1, 'name' => 'Administrator (all permissions)', 'email' => 'admin@test.com', 'role_id' => 1],
             ['id' => 2, 'name' => 'Editor (can add & edit)', 'email' => 'editor@test.com', 'role_id' => 2],
             ['id' => 3, 'name' => 'Reader (can read only)', 'email' => 'reader@test.com', 'role_id' => 3],
         ];

        foreach ($items as $item) {
            \App\Models\User::factory()->create([
                'name' => $item['name'],
                'email' => $item['email'],
                'role_id' => $item['role_id']
            ]);
        }

    }
}
