<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;
    protected $table = 'tips_vehicles';

    protected $fillable = ['marca', 'modelo', 'versao'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function search($filter)
    {

        $results = $this->where('marca', 'LIKE', "%{$filter}%")
                        ->orWhere('modelo', 'LIKE', "%{$filter}%")
                        ->orWhere('versao', 'LIKE', "%{$filter}%")
                        ->latest()
                        ->paginate();
        return $results;
    }
}
