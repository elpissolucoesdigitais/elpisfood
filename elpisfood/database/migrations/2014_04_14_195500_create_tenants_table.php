<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');
            //status tenant (se inativar 'N' ele perde o acesso ao sistema)
            $table->enum('active',['Y','N'])->default('Y');

            //subscription
            $table->date('subscription')->nullable();//data que se escreveu
            $table->date('expires_at')->nullable();//data que expira o acesso
            $table->string('subscription_id',255)->nullable();//identificador do gateway de pagamento
            $table->boolean('subscription_active')->default(false);//assinatura ativa
            $table->boolean('subscription_suspended')->default(false);//assinatura cancelada
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
