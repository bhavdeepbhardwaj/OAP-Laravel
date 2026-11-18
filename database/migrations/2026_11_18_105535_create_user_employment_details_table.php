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
        Schema::create('user_employment_details', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id');

            $table->string('organization_name', 200);
            $table->string('post_held', 200);
            $table->string('scale_of_pay', 255);

            $table->date('from_date');
            $table->date('to_date');

            $table->string('nature_of_duties', 300);
            $table->string('exp_pdf', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_employment_details');
    }
};
