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
        Schema::create('notices', function (Blueprint $table) {

            $table->increments('id');
            $table->string('advt_number', 255)->unique('advt_number');
            $table->string('advt_name', 255);

            // Original schema mein zero-date default diya gaya hai.
            // Is default ko MySQL SQL mode compatibility test ke baad configure karein.
            $table->timestamp('opening_date');
            $table->timestamp('closing_date');

            $table->year('year_of_recruitment');
            $table->string('advt_pdf', 255);

            $table->enum('vacancy_creation_status', [
                'Not Created',
                'Created'
            ])->default('Not Created');

            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('modified_on')->nullable();

            $table->unsignedInteger('created_by_user_id');
            $table->unsignedInteger('created_by_orgn_id');
            $table->unsignedInteger('updated_by_user_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
