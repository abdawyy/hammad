<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domain\Role\Models\Roles;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        Roles::insert([
            ['name' => 'Admin', 'is_active' => true],
            ['name' => 'User', 'is_active' => true],
            ['name' => 'Manager', 'is_active' => false],
        ]);
    }
}
