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
        Schema::create('vacancies', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('organization_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('notice_id')->unique('notice_id');
            $table->unsignedInteger('post_id');

            $table->string('classification', 100);

            $table->enum('recruitment_method', [
                'All India Services',
                'Ports',
                'Both(AIS & Ports)',
                'AIS & CCS Group A Services',
                'Composite',
                'Deputation',
                'Direct'
            ])->nullable();

            $table->unsignedInteger('pay_scale_id');

            $table->enum('post_category_wise', ['Yes', 'No']);

            $table->integer('no_of_posts')->nullable();

            $table->unsignedInteger('ur_vacancy_count')->nullable();
            $table->unsignedInteger('obc_vacancy_count')->nullable();
            $table->unsignedInteger('sc_vacancy_count')->nullable();
            $table->unsignedInteger('st_vacancy_count')->nullable();
            $table->unsignedInteger('others_vacancy_count')->nullable();

            $table->unsignedInteger('age_limit')->nullable();
            $table->unsignedInteger('probation_period')->nullable();

            $table->integer('exp_require')->nullable();

            $table->string('exp_details', 2100);
            $table->string('other_details', 2100);

            $table->enum('status', [
                'Drafted',
                'Waiting Approval',
                'Approved',
                'Approval Cancel',
                'Archived'
            ])->default('Drafted');

            $table->timestamp('active_upto')->nullable();
            $table->string('reason_not_to_approve', 300)->nullable();

            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('modified_on')->nullable();

            $table->unsignedInteger('created_by_user_id');
            $table->unsignedInteger('updated_by_user_id')->nullable();
            $table->unsignedInteger('created_by_orgn_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
