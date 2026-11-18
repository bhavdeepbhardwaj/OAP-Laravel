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
        Schema::create('cadres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cadre_name', 255)->unique('cadre_name');

            $table->unsignedInteger('created_by_user_id');
            $table->unsignedInteger('modified_by_user_id')->nullable();

            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('modified_on')
                ->nullable()
                ->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadres');
    }
};
