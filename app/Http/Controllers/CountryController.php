<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $country = Country::find(1);
        echo $country->nome;
        $latitude = $country->city()->get()->first();
        echo "<hr>".$latitude->latitude;
    }
    public function index_inverse(){
        $lat = 123;

        $latitude = City::where('latitude', $lat)->get()->first();
        echo $latitude->latitude;
    }
}
