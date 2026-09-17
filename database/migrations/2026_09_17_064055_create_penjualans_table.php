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
    Schema::create('penjualans', function (Blueprint $table) {
        $table->id();
        $table->string('no_faktur')->unique(); // Auto generate di controller
        $table->date('tanggal_kirim');
        $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('restrict');
        $table->decimal('total_harga', 15, 2)->default(0);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
