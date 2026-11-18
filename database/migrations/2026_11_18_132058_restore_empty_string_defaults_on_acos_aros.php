<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE acos
            MODIFY model VARCHAR(255) NULL DEFAULT '',
            MODIFY alias VARCHAR(255) NULL DEFAULT ''
        ");

        DB::statement("
            ALTER TABLE aros
            MODIFY model VARCHAR(255) NULL DEFAULT '',
            MODIFY alias VARCHAR(255) NULL DEFAULT ''
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE acos
            MODIFY model VARCHAR(255) NULL DEFAULT NULL,
            MODIFY alias VARCHAR(255) NULL DEFAULT NULL
        ");

        DB::statement("
            ALTER TABLE aros
            MODIFY model VARCHAR(255) NULL DEFAULT NULL,
            MODIFY alias VARCHAR(255) NULL DEFAULT NULL
        ");
    }
};
