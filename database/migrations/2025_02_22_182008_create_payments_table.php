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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->decimal('amount_paid', 8, 2);
            $table->date('date_of_payment');
            $table->integer('installment_number')->nullable();  
            $table->integer('total_installments')->nullable();
            $table->decimal('remaining_balance', 8, 2)->nullable();
            $table->enum('payment_type', ['emi', 'one_time'])->default('one_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
