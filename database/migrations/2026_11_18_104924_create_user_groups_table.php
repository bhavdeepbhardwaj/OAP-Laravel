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
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('name', 100);

            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();

            $table->unsignedInteger('level');

            $table->enum('dependency', ['none', 'organization'])
                ->default('organization');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
