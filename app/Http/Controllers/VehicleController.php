<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlan;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $repository;

    public function __construct(Vehicle $vehicle)
    {
        $this->repository = $vehicle;
    }
    public function index()
    {
        $vehicles =  $this->repository->latest()->paginate();
        return view('admin.pages.vehicles.index', compact('vehicles'));
    }
    public function create()
    {
        return view('admin.pages.vehicles.create');
    }
    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());
        

        return redirect()->route('admin.index');
    }
    public function show($url)
    {
        //Recuperando o veículo pela url
        $vehicle = $this->repository->where('url', $url)->first();

        //Verificando se o veículo foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$vehicle){
            return redirect()->back();
        }
            return view('admin.pages.vehicles.show', [ 'vehicle' => $vehicle ]);
    }
    public function destroy($url)
    {
        //Recuperando o veículo pela url
        $vehicle = $this->repository->where('url', $url)->first();

        //Verificando se o veículo foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$vehicle){
            return redirect()->back();
        }
            $vehicle->delete();
            return redirect()->route('admin.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $vehicles = $this->repository->search($request->filter);
        
        return view('admin.pages.vehicles.index', compact('vehicles', 'filters'));
    }

    public function edit($url)
    {
        //Recuperando o veículo pela url
        $vehicles = $this->repository->where('url', $url)->first();

        //Verificando se o veículo foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$vehicles){
            return redirect()->back();
        }
            return view('admin.pages.vehicles.edit', compact('vehicles'));
    }

    public function update(Request $request, $url)
    {
        $vehicles = $this->repository->where('url', $url)->first();

        //Verificando se o veículo foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$vehicles){
            return redirect()->back();
        }
        $vehicles->update($request->all());
        return redirect()->route('admin.index');
    }
    
}
