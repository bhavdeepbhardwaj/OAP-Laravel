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
        Schema::create('aros_acos', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('aro_id');
            $table->unsignedInteger('aco_id');

            $table->char('_create', 2)->default('0');
            $table->char('_read', 2)->default('0');
            $table->char('_update', 2)->default('0');
            $table->char('_delete', 2)->default('0');

            $table->index('aco_id', 'idx_aco_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aros_acos');
    }
};
