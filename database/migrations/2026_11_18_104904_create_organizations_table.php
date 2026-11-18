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
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization_name', 50)->unique('organization_name');
            $table->enum('organization_type', ['MOS', 'Non-MOS'])
                ->default('Non-MOS');

            $table->integer('created_by_user_id');
            $table->integer('modified_by_user_id')->nullable();

            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('modified_on')
                ->nullable()
                ->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
