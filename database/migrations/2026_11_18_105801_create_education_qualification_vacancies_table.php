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
        Schema::create('education_qualifications_vacancies', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('vacancy_id');
            $table->unsignedInteger('education_qualification_id');

            $table->unique(
                ['vacancy_id', 'education_qualification_id'],
                'uk_vacancy_education'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_qualifications_vacancies');
    }
};
