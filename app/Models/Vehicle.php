<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = ['name', 'url'];


    public function tips()
    {
        return $this->hasMany(Tip::class);
    }


    public function search($filter)
    {

        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('url', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
