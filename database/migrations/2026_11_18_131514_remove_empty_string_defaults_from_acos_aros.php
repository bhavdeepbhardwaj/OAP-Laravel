
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE `acos` MODIFY `model` VARCHAR(255) NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `acos` MODIFY `alias` VARCHAR(255) NULL DEFAULT NULL");

        DB::statement("ALTER TABLE `aros` MODIFY `model` VARCHAR(255) NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `aros` MODIFY `alias` VARCHAR(255) NULL DEFAULT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE `acos` MODIFY `model` VARCHAR(255) NULL DEFAULT ''");
        DB::statement("ALTER TABLE `acos` MODIFY `alias` VARCHAR(255) NULL DEFAULT ''");

        DB::statement("ALTER TABLE `aros` MODIFY `model` VARCHAR(255) NULL DEFAULT ''");
        DB::statement("ALTER TABLE `aros` MODIFY `alias` VARCHAR(255) NULL DEFAULT ''");
    }
};
