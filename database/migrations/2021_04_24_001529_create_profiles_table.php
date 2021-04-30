<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->longText('bio')->nullable();
            $table->string('address1')->nullable()->default('2200 W san Angelo st, Gilbert, AZ');
            $table->string('address2')->nullable()->default('2200 W san Angelo st, Gilbert, AZ');
            $table->string('post_code')->nullable()->default('GA-022');
            $table->string('country')->nullable()->default('Ghana');
            $table->string('phone')->nullable()->default('123 456 789');
            $table->string('banner')->default('banner.jpg')->nullable();
            $table->string('avatar')->default('avatar.jpg')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->boolean('comments_active')->nullable()->default(0);
            $table->foreignId('user_id')->constrained()->ondelete('cascade')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
