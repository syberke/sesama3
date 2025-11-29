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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code')->unique();
            $table->string('child_name');
            $table->string('Ayah_name');
            $table->string('Ibu_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('reference');
            $table->string('no_tlp');
            $table->text('address');
            $table->text('wilayah');

            $table->boolean('khitan_received')->default(false);
            $table->boolean('uang_bingkisan_received')->default(false);
            $table->boolean('fothobooth_received')->default(false);
            $table->boolean('is_distributed')->default(false);
            $table->timestamp('distributed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
