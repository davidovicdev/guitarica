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
            $table->integer('id', true);
            $table->integer('role_id')->index('fk_users_roles_idx');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('phone', 45)->unique('phone_UNIQUE');
            $table->string('address', 45)->unique('address_UNIQUE');
            $table->string('email', 45)->unique('email_UNIQUE');
            $table->string('password');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
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
