<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title', 100);
            $table->text('product_short_description');
            $table->text('product_full_description');
            $table->decimal('product_price', 7, 2)->default(0);
            $table->integer('product_quantity')->default(20);
            $table->string('product_image_path', 100);
            $table->string('product_image', 100);
            $table->string('product_category', 20);
            $table->string('product_group', 20)->default('default')->comment('default,exclusive,featured,upcoming');
            $table->tinyInteger('product_is_active')->default(1);
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
};