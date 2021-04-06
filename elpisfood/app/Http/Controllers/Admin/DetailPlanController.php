<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
