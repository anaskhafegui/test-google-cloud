<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->float('price')->nullable();
            $table->float('price_24hour')->nullable();
            $table->float('price_weekly')->nullable();
            $table->text('short_description')->nullable();
            $table->mediumText('long_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('is_rental')->default(false);
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
