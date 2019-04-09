<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{

    protected $departamentos = [
        ['Antioquia',	5],
        ['Atlantico',	8],
        ['D. C. Santa Fe de Bogotá',	11],
        ['Bolivar',	13],
        ['Boyaca',	15],
        ['Caldas',	17],
        ['Caqueta',	18],
        ['Cauca',	19],
        ['Cesar',	20],
        ['Cordova',	23],
        ['Cundinamarca',	25],
        ['Choco',	27],
        ['Huila',	41],
        ['La Guajira',	44],
        ['Magdalena',	47],
        ['Meta',	50],
        ['Nariño',	52],
        ['Norte de Santander',	54],
        ['Quindio',	63],
        ['Risaralda',	66],
        ['Santander',	68],
        ['Sucre',	70],
        ['Tolima',	73],
        ['Valle',	76],
        ['Arauca',	81],
        ['Casanare',	85],
        ['Putumayo',	86],
        ['San Andres',	88],
        ['Amazonas',	91],
        ['Guainia',	94],
        ['Guaviare',	95],
        ['Vaupes',	97],
        ['Vichada',	99]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->departamentos as $departamento) {
            DB::table('departamentos')->insert([
                'nombre' => $departamento['0'],
                'codigo' => $departamento['1'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}



