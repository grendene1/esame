<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmlandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmlands', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('photo')->nullable();
            $table->string('size')->nullable();
            $table->string('cadastralMap')->nullable();
            $table->string('cadastralParcel')->nullable();
            $table->string('landType')->nullable();
            $table->string('irrigationType')->nullable();
            $table->string('offerType')->nullable();
            $table->float('rental')->nullable();
            $table->boolean('available')->default(false)->nullable();
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
        Schema::dropIfExists('farmlands');
    }
}
