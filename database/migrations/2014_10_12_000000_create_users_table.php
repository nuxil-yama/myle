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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable()->unique();
            $table->integer('template_no')->default(1);
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            
            $table->string('line_user_id')->nullable();
            $table->string('line_display_name')->nullable();
            $table->string('line_picture_url')->nullable();

            $table->string('stripe_id')->nullable();

            $table->boolean('first_setting_flag')->default(false);;
            $table->json('meta')->nullable();;

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
