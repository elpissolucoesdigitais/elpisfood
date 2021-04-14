<?php

use App\Models\{
    Plan,Tenant
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create(
            [
                'cnpj'=>'121215454512',
                'name'=>'Burger e Sabor',
                'url'=>'burger-e-sabor',
                'email'=>'burgersabor@gmail.com',
            ]
        );
    }
}
