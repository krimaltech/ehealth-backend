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
            $table->id();
            $table->string('productName');
            $table->string('slug');
            $table->string('unit');
            $table->unsignedBigInteger('category_id');
            $table->string('image');
            $table->string('image_path');
            $table->longText('shortDesc');
            $table->longText('description')->nullable();
            $table->bigInteger('stock')->default(0);
            $table->boolean('featured')->default(0);
            $table->integer('user_id')->unsigned();
            $table->unsignedBigInteger('vendor_id');
            $table->string('discountPercent')->nullable();
            $table->integer('actualRate');
            $table->integer('sale_price')->nullable();
            $table->float('averageRating')->default(0);
            $table->integer('totalReviews')->default(0);
            $table->unsignedBigInteger('brand')->nullable();
            $table->string('tags')->nullable();
            $table->unsignedBigInteger('have_stock')->default(0);
            $table->string('sku')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->longText('precaution')->nullable();
            $table->longText('side_effect')->nullable();
            $table->longText('how_to_use')->nullable();
            $table->longText('drug_type')->nullable();
            $table->bigInteger('views')->default(0);
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
        Schema::dropIfExists('products');
    }
}
