<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->cascadeOnDelete();

            $table->foreignId('appointment_id')
                ->nullable()
                ->constrained('appointments')
                ->nullOnDelete();

            $table->foreignId('medical_record_id')
                ->nullable()
                ->constrained('medical_records')
                ->nullOnDelete();

            $table->string('description');

            $table->decimal('amount', 10, 2);

            $table->enum('status', [
                'Pending',
                'Paid',
                'Cancelled'
            ])->default('Pending');

            $table->date('payment_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};