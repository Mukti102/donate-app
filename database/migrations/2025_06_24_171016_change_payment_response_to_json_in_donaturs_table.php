<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donaturs', function (Blueprint $table) {
            // Ubah tipe kolom dari TEXT ke JSON
            $table->json('payment_response')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('donaturs', function (Blueprint $table) {
            // Balikkan ke TEXT jika rollback
            $table->text('payment_response')->change();
        });
    }
};
