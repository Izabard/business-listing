<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Admin'],
            ['id' => 2, 'title' => 'User'],
            ['id' => 3, 'title' => 'Editor'],
        ];

        foreach ($items as $item) {
            Role::create($item);
        }
    }
}
