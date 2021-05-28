<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable();
            $table->longtext('business_description')->nullable();
            $table->string('business_email')->nullable();
            $table->string('business_number')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('youtube_handle')->nullable();
            $table->text('seo_keywords')->nullable();
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
        Schema::dropIfExists('business');
    }
}
