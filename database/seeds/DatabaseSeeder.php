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
        $this->call(DepartamentosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(ComunasTableSeeder::class);
        $this->call(PerfilsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
