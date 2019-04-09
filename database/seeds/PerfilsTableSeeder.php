<?php

use Illuminate\Database\Seeder;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Admin'
        ]);
        DB::table('users')->insert([
            'name' =>'Normal'
        ]);
    }
}
