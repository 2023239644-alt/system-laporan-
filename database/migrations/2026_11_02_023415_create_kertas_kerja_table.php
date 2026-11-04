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
        Schema::create('kertas_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Links to Staff (users table)
            $table->string('tajuk');
            $table->text('pengenalan');
            $table->text('objektif');
            $table->enum('status', ['Draft', 'Pending', 'Lulus', 'Ditolak', 'KIV'])->default('Draft');
            $table->decimal('jumlah_bajet_lulus', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kertas_kerjas');
    }
};