<?php

namespace Database\Seeders\Dashboard;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'theCreator']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'whatsapp']);
        Role::create(['name' => 'e_commerce']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'user_comment']);
    }
}