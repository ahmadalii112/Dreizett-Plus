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
        Schema::table('residential_communities', function (Blueprint $table) {
            $table->dropColumn('deduction_amount');
            $table->decimal('deduction_amount_care_level_5', 10, 2)->default(0)->after('household_allowance')->comment('Deduction Amount Level of Care 5');
            $table->decimal('deduction_amount_care_level_4', 10, 2)->default(0)->after('household_allowance')->comment('Deduction Amount Level of Care 4');
            $table->decimal('deduction_amount_care_level_3', 10, 2)->default(0)->after('household_allowance')->comment('Deduction Amount Level of Care 3');
            $table->decimal('deduction_amount_care_level_2', 10, 2)->default(0)->after('household_allowance')->comment('Deduction Amount Level of Care 2');
            $table->decimal('deduction_amount_care_level_1', 10, 2)->default(0)->after('household_allowance')->comment('Deduction Amount Level of Care 1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('residential_communities', function (Blueprint $table) {
            $table->integer('deduction_amount')->nullable()->after('household_allowance')->comment('Amount depending on the level of care, 1-5');
            $table->dropColumn([
                'deduction_amount_care_level_1',
                'deduction_amount_care_level_2',
                'deduction_amount_care_level_3',
                'deduction_amount_care_level_4',
                'deduction_amount_care_level_5',
            ]);
        });
    }
};
