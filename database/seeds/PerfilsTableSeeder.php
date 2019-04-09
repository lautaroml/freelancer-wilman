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
        DB::table('perfils')->insert([
            'nombre' =>'Admin'
        ]);
        DB::table('perfils')->insert([
            'nombre' =>'Normal'
        ]);
    }
}
