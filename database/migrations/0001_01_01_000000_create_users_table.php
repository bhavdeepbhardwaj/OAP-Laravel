
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username', 20)->unique('username');
            $table->string('email', 100)->unique('email');
            $table->string('password', 100);

            $table->enum('u_name_title', ['Mr.', 'Ms.', 'Mrs.', 'Dr.'])->nullable();
            $table->string('f_name', 100);
            $table->string('m_name', 100)->nullable();
            $table->string('l_name', 100);

            $table->string('profilepic', 255)->nullable();
            $table->string('profilesignature', 255)->nullable();
            $table->string('mobile_number', 100)->nullable()->unique('mobile-no');

            $table->unsignedInteger('organization_id');
            $table->unsignedInteger('office_location_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('designation_id')->nullable();

            $table->string('forget_password_key', 100)->nullable();

            $table->timestamp('created_on')->useCurrent();
            $table->unsignedInteger('created_by_user_id')->nullable();
            $table->unsignedInteger('modified_by_user_id')->nullable();
            $table->timestamp('modified_on')->nullable();

            $table->string('ip_address', 15)->nullable();

            $table->string('password_reset_key', 255)->nullable();
            $table->timestamp('reset_key_sent_on')->nullable();
            $table->timestamp('password_reset_on')->nullable();

            $table->enum('status', ['Active', 'Deactive'])
                ->default('Active');

            $table->enum('password_status', ['Unchanged', 'Changed'])
                ->default('Changed');

            $table->boolean('force_password_change')
                ->nullable()
                ->default(false);

            // $table->unique('email');
            // $table->unique('username');
            // $table->unique('mobile_number', 'mobile-no');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
