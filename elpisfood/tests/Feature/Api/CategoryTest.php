<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Error Get categories by Tenant
     *
     * @return void
     */
    public function testErrorGetAllCategoriesByTenant()
    {
        $response = $this->getJson('api/v1/categories');

        $response->assertStatus(422);
    }

    /**
     * Error Get categories by Tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("api/v1/categories?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
