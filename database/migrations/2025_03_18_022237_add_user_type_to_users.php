<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('user_type_id')
                ->constrained('user_types')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove a constraint de chave estrangeira de forma condicional
        DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_user_type_id_foreign');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type_id');
        });
    }
};
