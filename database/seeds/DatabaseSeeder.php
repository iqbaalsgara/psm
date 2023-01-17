<?php

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
        // $this->call(UserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DetailCustomerSeeder::class);
    }
}
