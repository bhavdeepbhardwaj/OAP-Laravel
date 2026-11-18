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
        Schema::create('log_user_qualifications', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_applied_vacancy_id');

            $table->string('education_qualification_name', 255);
            $table->string('university', 255);

            $table->year('y_o_p');

            $table->enum('class_type', [
                'Distinction',
                'First Class',
                'Second Class',
                'Third Class'
            ])->nullable();

            $table->float('perc_obtained', 23);
            $table->string('special_subject', 100);
            $table->string('edu_pdf', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_user_qualifications');
    }
};
