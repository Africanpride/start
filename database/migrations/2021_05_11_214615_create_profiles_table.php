<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function(Blueprint $table)
        {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->longtext('bio', 255)->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('banner')->nullable();
            $table->string('avatar')->default('avatar.jpg')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->foreignId('user_id')->constrained()->ondelete('cascade')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile');
    }
}
