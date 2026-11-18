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
        Schema::create('service_and_batch_infos', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id')->unique('user_id');
            $table->unsignedInteger('service_id');
            $table->year('batch');
            $table->unsignedInteger('cadre_id');

            $table->string('other_cadre_name', 255)->nullable();

            $table->timestamp('doj_grp_a')
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->text('exp_prt_ship');
            $table->text('write_up1_data');
            $table->text('write_up2_data');

            $table->string('write_up_1', 255)->nullable();
            $table->string('write_up_2', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_and_batch_infos');
    }
};
