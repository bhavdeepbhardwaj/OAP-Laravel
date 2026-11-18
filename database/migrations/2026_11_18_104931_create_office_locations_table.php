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
        Schema::create('office_locations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('organization_id');
            $table->string('location_name', 100);
            $table->string('location_address', 255);
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('city_id');

            $table->unsignedInteger('created_by_user_id');
            $table->unsignedInteger('modified_by_user_id')->nullable();

            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('modified_on')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->unique(
                ['organization_id', 'location_name'],
                'uk_orgn_location'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('office_locations');
    }
};
