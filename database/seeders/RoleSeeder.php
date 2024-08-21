<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['nom' => Role::ADMIN]);
        Role::create(['nom' => Role::AUTHOR]);
        Role::create(['nom' => Role::USER]);
    }
}

