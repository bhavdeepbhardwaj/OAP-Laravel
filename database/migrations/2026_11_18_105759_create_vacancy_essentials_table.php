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
        Schema::create('vacancies_essentials', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('vacancy_id');
            $table->unsignedInteger('essential_id');

            $table->unique(
                ['vacancy_id', 'essential_id'],
                'vacancy_id'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies_essentials');
    }
};
