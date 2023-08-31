<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        
        $this->call([
            RoleSeeder::class,
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'role_id' => 1,
            'password' => bcrypt('password')
        ]);
        User::factory(10)->create();
    }
}
