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
        Schema::create('aros', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('model', 255)->nullable();
            $table->unsignedInteger('foreign_key')->nullable();
            $table->string('alias', 255)->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rght')->nullable();

            $table->index(['lft', 'rght'], 'idx_aros_lft_rght');
            $table->index('alias', 'idx_aros_alias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aros');
    }
};
