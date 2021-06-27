<?php

namespace App\Http\Controllers;

use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository;
    protected $plan;
    public function __construct(DetailPlan $details, Plan $plan)
    {
        $this->repository = $details;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        /**Recuperando um plano pela URL */

        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }
        $details = $plan->details()->latest()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(Request $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }

    public function edit($urlPlan, $idPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }
    }
}
