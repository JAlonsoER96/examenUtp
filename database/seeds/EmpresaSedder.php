<?php

use App\Empresa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EmpresaSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Empresa::truncate();
        $users =  [
            [
                'nombre' => 'Usados Tracto Camiones',
                'direccion' => Str::random(40),
                'giro' => 'Otro',
            ],
            [
                'nombre' => 'Bimbo',
                'direccion' => Str::random(40),
                'giro' => 'Alimencio',
            ],
            [
                'nombre' => 'Volvo',
                'direccion' => Str::random(40),
                'giro' => 'Otro',
            ],
          ];

          Empresa::insert($users);
    }
}
