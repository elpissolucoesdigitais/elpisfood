<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test Get All Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {

        factory(Tenant::class,10)->create();

        $response = $this->getJson('api/v1/tenants');
        //$response->dump();
        $response->assertStatus(200)
                ->assertJsonCount(10,'data');
    }

    /**
     * Test Get Error Single Tenants
     *
     * @return void
     */
    public function testErrorGetTenants()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("api/v1/tenants/{$tenant}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Test Get Tenant by identify
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("api/v1/tenants/{$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
