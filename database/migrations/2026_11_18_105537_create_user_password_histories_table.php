<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_password_histories', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->string('password', 255);

            $table->timestamp('created_on')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_password_histories');
    }
};
