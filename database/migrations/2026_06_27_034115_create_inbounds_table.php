<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('inbounds', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        $table->integer('qty'); // Jumlah barang masuk
        $table->decimal('supplier_price', 15, 2); // Harga dari supplier per item
        $table->decimal('total_cost', 15, 2); // Total pengeluaran modal (qty * supplier_price)
        $table->date('date'); // Tanggal barang masuk
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inbounds');
    }
};
