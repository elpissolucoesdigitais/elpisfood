<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
         return $this->tenantService = $tenantService;

    }
    public function index(Request $request)
    {
        $per_page = $request->get('per_page',15);
        $tenants = $this->tenantService->getAllTenants($per_page);
        return TenantResource::collection($tenants);
    }
    public function show($uuid)
    {
        if(!$tenant = $this->tenantService->getTenantByUuid($uuid))
        {
            return response()->json(['message'=>'NOT FOUND'],404);
        }

        return new TenantResource($tenant);
    }
}
