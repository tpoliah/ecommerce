<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('address_type')->default(0)->comment('1=shipping,2=billing,3=shipping and billing');
            $table->tinyInteger('address_is_default')->default(0)->comment('0=not default, 1=default');
            $table->string('address_first_name', 100);
            $table->string('address_last_name', 100);
            $table->string('address_email', 100);
            $table->string('address_contact', 12)->nullable();
            $table->string('address_line1', 255);
            $table->string('address_line2', 255)->nullable();
            $table->string('address_city', 100);
            $table->string('address_state', 100);
            $table->string('address_zip_code', 10)->nullable();
            $table->string('address_country', 100);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};