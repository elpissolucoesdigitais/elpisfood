<?php

namespace App\Repositories;

use App\Repositories\Contracts\productRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRepository implements productRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'products';
    }

    public function getProductsByTenantId(int $idTenant)
    {
        return DB::table($this->table)
                ->where('tenant_id',$idTenant)
                ->get();
    }
}
