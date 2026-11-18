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
        Schema::create('users_vacancies_desirables', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('vacancies_desirable_id');
            $table->text('desirable_comments');

            $table->unique(
                ['user_id', 'vacancies_desirable_id'],
                'uk'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_vacancies_desirables');
    }
};
