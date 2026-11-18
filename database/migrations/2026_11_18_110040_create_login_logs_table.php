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
        Schema::create('login_logs', function (Blueprint $table) {

            $table->integer('id', true, false);

            $table->string('username', 20);
            $table->string('ip_address', 15);
            $table->string('process_id', 20);
            $table->string('user_agent', 255);

            $table->timestamp('attempt_on')->useCurrent();

            $table->enum('status', [
                'Successful',
                'Failed-Wrong Credentials',
                'Failed-Wrong Captcha',
                'Logged Out'
            ])->default('Successful');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
