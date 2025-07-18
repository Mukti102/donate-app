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
        Schema::table('category_campaigns', function (Blueprint $table) {
            $table->text('subtitle')->nullable();
            $table->string('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_campaigns', function (Blueprint $table) {
            $table->dropColumn('subtitle');
            $table->dropColumn('icon');
        });
    }
};
