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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->longText('address')->nullable();
            $table->foreignId('provinces_id')->nullable()->index('provinces_id_fk1_idx');
            $table->foreignId('regencies_id')->nullable()->index('regencies_id_fk2_idx');
            $table->integer('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('roles')->default('USER');

            $table->softDeletes();
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
