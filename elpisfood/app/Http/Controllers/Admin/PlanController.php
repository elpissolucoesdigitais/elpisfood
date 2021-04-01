<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
class PlanController extends Controller
{
    private $repository;
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    public function index()
    {
        $plans = $this->repository->paginate();
        return view('admin.pages.plans.index', compact('plans'));
    }
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }
}
