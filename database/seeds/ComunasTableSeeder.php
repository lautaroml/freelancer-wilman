<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ComunasTableSeeder extends Seeder
{

    protected $comunas = [
        [1,  '3.455.689,',  '-76.557.892', 24, 1],
        [2,  '3.475.076,',  '-76.522.173', 24, 1],
        [3,  '3.447.046,',  '-76.533.042', 24, 1],
        [4,  '3.470.196,',  '-76.510.806', 24, 1],
        [5,  '3.470.170,',  '-76.494.404', 24, 1],
        [6,  '3.490.009,',  '-76.488.586', 24, 1],
        [7,  '3.456.410,',  '-76.484.545', 24, 1],
        [8,  '3.446.520,',  '-76.506.595', 24, 1],
        [9,  '3.398.429,',  '-76.541.815', 24, 1],
        [10, '3.415.903,',  '-76.530.736', 24, 1],
        [11, '3.421.004,',  '-76.517.575', 24, 1],
        [12, '3.419.465,',  '-76.502.709', 24, 1],
        [13, '3.431.998,',  '-76.492.458', 24, 1],
        [14, '3.425.142,',  '-76.478.034', 24, 1],
        [15, '3.412.059,',  '-76.497.908', 24, 1],
        [16, '3.398.926,',  '-76.521.793', 24, 1],
        [17, '3.386.982,',  '-76.522.838', 24, 1],
        [18, '3.379.225,',  '-76.545.005', 24, 1],
        [19, '3.421.221,',  '-76.549.711', 24, 1],
        [20, '3.417.529,',  '-76.555.436', 24, 1],
        [21, '3.440.675,',  '-76.470.084', 24, 1],
        [22, '3.343.290,',  '-76.539.317', 24, 1]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->comunas as $comuna) {
            DB::table('comunas')->insert([
                'nombre' => $comuna['0'],
                'comuna_lat' => $comuna['1'],
                'comuna_long' => $comuna['2'],
                'departamento_id' => $comuna['3'],
                'municipio_id' => $comuna['4'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}



