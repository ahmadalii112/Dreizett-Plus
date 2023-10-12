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
        Schema::table('users', function (Blueprint $table) {
            // Remove the unique constraint from the "email" field and make it nullable
            $table->string('email')->nullable()->change();
            // Add the "username" field as unique
            $table->string('username')->nullable()->unique()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // To reverse the changes, drop the "username" unique constraint
            $table->dropUnique(['username']);
            $table->dropColumn('username');
            // Add back the unique constraint to the "email" field
            $table->string('email')->nullable(false)->change();
        });
    }
};
