<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScategoryServiceTable extends Migration
{
    /**
     * This is a pivot table
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scategory_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('scategory_id');
            $table->string('category_service')->nullable();
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
        Schema::dropIfExists('scategory_service');
    }
}
