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
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->after('id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            // Remove the foreign key constraint and column for 'apartment_id'
            if (Schema::hasColumn('rooms', 'apartment_id')) {
                $table->dropForeign(['apartment_id']);
                $table->dropColumn('apartment_id');
            }
        });
        // Add the 'community_id' foreign key column
        Schema::table('rooms', function (Blueprint $table) {
            if (! Schema::hasColumn('rooms', 'community_id')) {
                $table->foreignId('community_id')->nullable()->after('id')->constrained('residential_communities')->onUpdate('cascade')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('rooms', 'community_id')) {
            Schema::table('rooms', function (Blueprint $table) {
                $table->dropForeign(['community_id']);
                $table->dropColumn('community_id');
            });
        }
        if (! Schema::hasColumn('rooms', 'apartment_id')) {
            Schema::table('rooms', function (Blueprint $table) {
                $table->foreignId('apartment_id')->nullable()->after('id')->constrained('shared_apartments')->onDelete('cascade')->onUpdate('cascade');
            });
        }
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};
