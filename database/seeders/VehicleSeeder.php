<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create(
            ['name' => 'Moto']
        );
        Vehicle::create(
            ['name' => 'Carro']
        );
        Vehicle::create(
            ['name' => 'Caminhão']
        );
    }
}
