<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name',128);
            $table->string('last_name',128)->nullable();
            $table->string('username',128)->unique();
            $table->string('email',128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token',88)->nullable();
            $table->string('password',128);
            $table->string('phone_number',32)->unique();

            $table->string('street_address');
            $table->unsignedTinyInteger('division_id')->comment('Division Table ID');
            $table->unsignedTinyInteger('district_id')->comment('District Table ID');

            $table->unsignedTinyInteger('status')->default(1)->comment('0=In-Active|1=Active| 2=Ban');
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('shipping_address')->nullable();

//            $table->bigInteger('reward_points')->default(0);
//            $table->string('facebook_id',32)->nullable();
//            $table->string('google_id',32)->nullable();
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
}
