<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Support\Str;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    public function index()
    {
        $plans =  $this->repository->latest()->paginate();
        return view('admin.pages.plans.index', compact('plans'));
    }
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(StoreUpdatePlan $request)
    {
        $data = $request->all();
        //Direcionando para a coluna URL o que vem do campo NOME do formulário
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }
    public function show($url)
    {
        //Recuperando o plano pela url
        $plan = $this->repository->where('url', $url)->first();

        //Verificando se o plano foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$plan){
            return redirect()->back();
        }
            return view('admin.pages.plans.show', [ 'plan' => $plan ]);
    }
    public function destroy($url)
    {
        //Recuperando o plano pela url
        $plan = $this->repository->where('url', $url)->first();

        //Verificando se o plano foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$plan){
            return redirect()->back();
        }
            $plan->delete();
            return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }

    public function edit($url)
    {
        //Recuperando o plano pela url
        $plans = $this->repository->where('url', $url)->first();

        //Verificando se o plano foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$plans){
            return redirect()->back();
        }
            return view('admin.pages.plans.edit', compact('plans'));
    }

    public function update(Request $request, $url)
    {
        $plans = $this->repository->where('url', $url)->first();

        //Verificando se o plano foi encontrado, caso não seja, é redirecionado para a página onde estava
        if (!$plans){
            return redirect()->back();
        }
        $plans->update($request->all());
        return redirect()->route('plans.index');
    }
    
}
