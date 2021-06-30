<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\vehicle;

class PlanObeserver
{
    /**
     * Handle the vehicle "creating" event.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return void
     */
    public function creating(vehicle $vehicle)
    {
        $vehicle->url = Str::kebab($vehicle->name);
    }

    /**
     * Handle the vehicle "updating" event.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return void
     */
    public function updating(vehicle $vehicle)
    {
        //Direcionando para a coluna URL o que vem do campo NOME do formulário
        $vehicle->url = Str::kebab($vehicle->name);

    }
}
