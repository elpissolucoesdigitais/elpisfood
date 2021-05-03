<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('title');
            $table->string('image');
            $table->double('price',10,2);
            $table->string('flag');
            $table->text('description');
            $table->timestamps();
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')
                            ->references('id')
                            ->on('tenants')
                            ->onDelete('cascade');

        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Category_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('Category_id')
                            ->references('id')
                            ->on('categories')
                            ->onDelete('cascade');

            $table->foreign('product_id')
                            ->references('id')
                            ->on('products')
                            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
    }
}
