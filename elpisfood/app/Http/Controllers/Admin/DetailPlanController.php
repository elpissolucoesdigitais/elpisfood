<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use Illuminate\Http\Request;
use App\Models\DetailPlan;
use App\Models\Plan;

class DetailPlanController extends Controller
{
    protected $repository, $plan;
    public function __construct(DetailPlan $detailPan, Plan $plan)
    {
        $this->repository = $detailPan;
        $this->plan = $plan;
    }
    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }
        //$details = $plan->details();
        //dd($details);
        //paginar dados do plano
        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index',compact('plan','details'));
    }
    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('plan'));
    }
    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit', compact('plan','detail'));
    }
    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first())
        {
            return redirect()->back();
        }
        //dd($request->all());
        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index',$plan->url);
    }
    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        $detail->update($request->all());

        return redirect()->route('details.plan.index',$plan->url);
    }
    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show', compact('plan','detail'));
    }
    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        $detail->delete();

        return redirect()
                        ->route('details.plan.index',$plan->url)
                        ->with('message','Registro deletado com sucesso!');
    }
}
