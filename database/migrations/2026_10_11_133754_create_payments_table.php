
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bill_id')
                ->constrained('bills')
                ->restrictOnDelete();

            $table->string('receipt_number')->unique();

            $table->decimal('amount_paid', 10, 2);

            $table->enum('payment_method', [
                'Cash',
                'GCash',
                'Bank Transfer'
            ])->default('Cash');

            $table->string('reference_number')->nullable();

            $table->foreignId('received_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('payment_date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

