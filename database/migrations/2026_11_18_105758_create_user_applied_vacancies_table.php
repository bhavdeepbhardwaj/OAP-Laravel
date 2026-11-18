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
        Schema::create('user_applied_vacancies', function (Blueprint $table) {

            $table->increments('id');

            // Original schema: signed INT, not unsigned.
            $table->integer('vacancy_id');
            $table->integer('user_id');

            $table->timestamp('applied_on')->useCurrent();

            $table->enum('status', [
                'Submitted',
                'Incomplete Documents',
                'Call for Interview'
            ])->default('Submitted');

            $table->string('remarks', 500)->nullable();

            $table->string('acr_pdf', 255)->default('None');
            $table->string('vigl_pdf', 255)->default('None');
            $table->string('cadre_pdf', 255)->default('None');

            $table->timestamp('docs_uploaded_on')->nullable();

            $table->text('vigl_case_text')->nullable();
            $table->text('exp_feeder_grade')->nullable();

            $table->string('acr_status', 600)->nullable();

            $table->enum('eligiblity_position', [
                'Eligible',
                'Not Eligible'
            ])->nullable();

            $table->string('remarks_by_officer', 600)->nullable();

            $table->unsignedInteger('applicant_status_last_updated_by_user_id')
                ->nullable();

            $table->timestamp('applicant_status_last_updated_on')->nullable();

            $table->unique(
                ['vacancy_id', 'user_id'],
                'vacncy_user'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_applied_vacancies');
    }
};
