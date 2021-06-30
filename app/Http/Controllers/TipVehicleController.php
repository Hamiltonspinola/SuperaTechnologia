<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTipVehicle;
use App\Models\Tip;
use App\Models\Vehicle;

class TipVehicleController extends Controller
{
    protected $repository;
    protected $vehicle;
    
    public function __construct(Tip $tips, Vehicle $vehicle)
    {
        $this->repository = $tips;
        $this->vehicle = $vehicle;
    }

    public function index($urlVehicle)
    {
        /**Recuperando um veículo pela URL */

        if(!$vehicle = $this->vehicle->where('url', $urlVehicle)->first()){
            return redirect()->back();
        }
        $tips = $vehicle->tips()->latest()->paginate(2);

        return view('admin.pages.vehicles.tips.index', compact('vehicle', 'tips'));
    }

    public function create($urlVehicle)
    {
        if(!$vehicle = $this->vehicle->where('url', $urlVehicle)->first()){
            return redirect()->back();
        }

        return view('admin.pages.vehicles.tips.create', compact('vehicle'));
    }
    

    public function store(StoreUpdateTipVehicle $request, $urlVehicle)
    {
        if(!$vehicle = $this->vehicle->where('url', $urlVehicle)->first()){
            return redirect()->back();
        }

        $vehicle->tips()->create($request->all());

        return redirect()->route('vehicles.tips.index', $vehicle->url);
    }

    public function edit($urlVehicle, $idTips) 
    {
        if(!$vehicle = $this->vehicle->where('url', $urlVehicle)->first()){
            return redirect()->back();
        }

        $tips = $this->repository->find($idTips);

        return view('admin.pages.vehicles.tips.edit', compact('vehicle', 'tips'));
    }

    public function update(StoreUpdateTipVehicle $request, $urlVehicle, $idTips)
    {

        $vehicle = $this->vehicle->where('url', $urlVehicle)->first();
        $tips = $this->repository->find($idTips);

        if(!$vehicle || !$tips){
            return redirect()->back();
        }

        $tips->update($request->all());

        return redirect()->route('vehicles.tips.index', $vehicle->url);
    }

    public function show($urlVehicle, $idTips)
    {
        $vehicle = $this->vehicle->where('url', $urlVehicle)->first();
        $tips = $this->repository->find($idTips);

        if(!$vehicle || !$tips){
            return redirect()->back();
        }

        return view('admin.pages.vehicles.tips.show', compact('vehicle', 'tips'));
    }

    public function destroy($urlVehicle, $idTips)
    {
        $vehicle = $this->vehicle->where('url', $urlVehicle)->first();
        $tips = $this->repository->find($idTips);

        if(!$vehicle || !$tips){
            return redirect()->back();
        }

        $tips->delete();

        return redirect()->route('vehicles.tips.index', $vehicle->url);
    }

        
    public function search(StoreUpdateTipVehicle $request, $urlVehicle)
    {
        if(!$vehicle = $this->vehicle->where('url', $urlVehicle)->first()){
            return redirect()->back();
        }

        $filters = $request->except('_token');
        $tips = $this->repository->search($request->filter);
        
        return view('admin.pages.vehicles.tips.index', compact('tips', 'filters', 'vehicle'));
    }

    

    
}
