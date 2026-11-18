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
        Schema::create('information_users', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id')->unique('user_id');

            $table->string('uf_f_name', 100);
            $table->string('uf_m_name', 100)->nullable();
            $table->string('uf_l_name', 100);

            $table->string('um_f_name', 100);
            $table->string('um_m_name', 100)->nullable();
            $table->string('um_l_name', 100);

            $table->enum('gender', ['Male', 'Female']);
            $table->enum('community', [
                'General',
                'SC',
                'ST',
                'OBC',
                'PWD',
                'Others'
            ])->nullable();

            $table->enum('religion', [
                'Buddhism',
                'Christian',
                'Hinduism',
                'Jainism',
                'Muslim',
                'Sikh'
            ])->nullable();

            $table->date('d_o_b');
            $table->unsignedInteger('s_o_b')->nullable();
            $table->string('p_o_b', 200)->nullable();
            $table->unsignedInteger('nationality_id');

            $table->enum('marital_status', ['Single', 'Married'])->nullable();
            $table->string('hobbies', 255)->nullable();

            $table->string('o_address', 255)->nullable();
            $table->unsignedInteger('o_state_id')->nullable();
            $table->unsignedInteger('o_city_id')->nullable();
            $table->string('o_pincode', 10)->nullable();
            $table->string('o_std_code', 10)->nullable();
            $table->string('o_landline_num', 15)->nullable();

            $table->string('r_address', 255)->nullable();
            $table->unsignedInteger('r_state_id')->nullable();
            $table->unsignedInteger('r_city_id')->nullable();
            $table->string('r_pincode', 10)->nullable();
            $table->string('r_mobile_number', 100)->nullable();
            $table->string('r_std_code', 10)->nullable();
            $table->string('r_landline_num', 15)->nullable();

            $table->enum('physically_challenged', ['No', 'Yes'])
                ->default('No');

            $table->unsignedInteger('disability_id')->nullable();
            $table->string('other_disability', 255)->nullable();

            $table->enum('working_under', [
                'Central Government',
                'State Government',
                'Autonomous Organizations',
                'Government Undertakings',
                'Private Organization'
            ])->nullable();

            $table->string('other_orgn_name', 255)->nullable();
            $table->timestamp('d_o_i_appoint')->nullable();

            $table->enum('present_emp_type', [
                'Ad-hoc',
                'Deputation',
                'Temporary',
                'Transfer',
                'Permanent'
            ])->nullable();

            $table->timestamp('dt_appoint_date')->nullable();
            $table->string('period_of_appoint_dt', 50)->nullable();

            $table->unsignedInteger('name_o_p_orgn')->nullable();
            $table->string('other_parent_organization', 255)->nullable();

            $table->text('nature_of_present_emp')->nullable();

            $table->unsignedInteger('current_organization')->nullable();
            $table->string('other_current_organization', 255)->nullable();

            $table->dateTime('d_o_r')->nullable();

            $table->string('present_post', 200)->nullable();
            $table->string('present_scale_pay', 200)->nullable();
            $table->string('present_grade_pay', 200)->nullable();

            $table->timestamp('strt_dt_of_pay')->nullable();
            $table->timestamp('cont_reg_appoint_date')->nullable();

            $table->enum('belong_to_ci', ['CDA', 'IDA'])->nullable();

            $table->string('consolidated_emoluments', 100)->nullable();
            $table->string('statement', 255)->nullable();
            $table->string('additional_info', 255)->nullable();

            $table->string('vigilance_pdf', 255)->nullable();
            $table->string('caste_pdf', 255)->nullable();

            $table->enum('current_status', [
                'registered',
                'step1_bi',
                'step2_cond',
                'step3_qd',
                'step4_csd',
                'step5_expd',
                'step6_pic'
            ])->default('registered');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('information_users');
    }
};
