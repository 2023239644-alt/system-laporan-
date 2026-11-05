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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->constrained('proposals')->onDelete('cascade');
            $table->string('program_type');
            $table->string('program_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('venue');
            $table->decimal('requested_budget', 10, 2)->default(0);
            $table->decimal('approved_budget', 10, 2)->nullable();
            $table->enum('report_status', ['pending', 'submitted', 'overdue'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};