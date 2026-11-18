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
        Schema::create('departments_office_locations', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('office_location_id');
            $table->unsignedInteger('department_id');

            $table->unique(
                ['office_location_id', 'department_id'],
                'uk_office_department'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments_office_locations');
    }
};
