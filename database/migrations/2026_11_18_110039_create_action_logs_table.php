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
        Schema::create('action_logs', function (Blueprint $table) {

            $table->increments('id');

            $table->string('username', 20);
            $table->string('action_requested', 255);
            $table->text('full_url');
            $table->string('process_id', 20);
            $table->string('refferer_url', 255);

            $table->timestamp('requested_on')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_logs');
    }
};
