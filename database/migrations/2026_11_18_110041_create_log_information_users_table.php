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
        Schema::create('log_information_users', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_applied_vacancy_id')->unique('user_id');

            $table->enum('u_name_title', ['Mr.', 'Ms.', 'Mrs.', 'Dr.'])->nullable();

            $table->string('f_name', 100);
            $table->string('m_name', 100)->nullable();
            $table->string('l_name', 100);

            $table->string('profilepic', 255);
            $table->string('profilesignature', 255)->nullable();
            $table->string('mobile_number', 100)->nullable();
            $table->string('organization_name', 50)->nullable();

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

            $table->string('birth_state', 50)->nullable();
            $table->string('p_o_b', 200)->nullable();
            $table->string('nationality_name', 200)->nullable();

            $table->enum('marital_status', ['Single', 'Married'])->nullable();
            $table->string('hobbies', 255)->nullable();

            $table->string('o_address', 255)->nullable();
            $table->string('o_state_name', 50)->nullable();
            $table->string('o_city_name', 50)->nullable();
            $table->string('o_pincode', 10)->nullable();
            $table->string('o_std_code', 10)->nullable();
            $table->string('o_landline_num', 15)->nullable();

            $table->string('r_address', 255)->nullable();
            $table->string('r_state_name', 50)->nullable();
            $table->string('r_city_name', 50)->nullable();
            $table->string('r_pincode', 10)->nullable();
            $table->string('r_mobile_number', 100)->nullable();
            $table->string('r_std_code', 10)->nullable();
            $table->string('r_landline_num', 15)->nullable();

            $table->enum('physically_challenged', ['No', 'Yes'])->default('No');
            $table->string('disability_name', 255)->nullable();
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
            $table->string('name_o_p_orgn_text', 255)->nullable();
            $table->string('other_parent_organization', 255)->nullable();

            $table->text('nature_of_present_emp')->nullable();

            $table->string('current_organization_text', 255)->nullable();
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
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_information_users');
    }
};
