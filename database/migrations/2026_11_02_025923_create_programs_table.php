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
        Schema::create('working_papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Links to Staff (users table)
            $table->string('title');
            $table->text('introduction');
            $table->text('objective');
            $table->enum('status', ['Draft', 'Pending', 'Approved', 'Rejected', 'KIV'])->default('Draft');
            $table->decimal('total_approved_budget', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_papers');
    }
};