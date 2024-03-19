<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Invoice;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('date');
            $table->double('amount');
            $table->enum('status', [
                Invoice::STATUS_PAID,
                Invoice::STATUS_UNPAID,
                Invoice::STATUS_CANCELLED
            ])
                ->default(Invoice::STATUS_UNPAID);
            $table->timestamps();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_customer_id_foreign');
        });
        Schema::dropIfExists('invoices');
    }
};
