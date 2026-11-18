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
        Schema::create('user_qualifications', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('education_qualification_id');

            $table->string('other_qualification', 255)->nullable();
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

            $table->timestamp('created_on')->useCurrent();

            $table->timestamp('modified_on')
                ->nullable()
                ->useCurrentOnUpdate();

            $table->unique(
                [
                    'user_id',
                    'education_qualification_id',
                    'other_qualification',
                    'y_o_p'
                ],
                'user_id'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_qualifications');
    }
};
