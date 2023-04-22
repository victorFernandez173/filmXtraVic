<?php

use App\Models\Obra;
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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poster_id')->constrained();
            $table->string('titulo', 200);
            $table->string('titulo_original', 200);
            $table->string('pais', 60);
            $table->decimal('duracion', 3, 0, true);
            $table->string('sinopsis', 2500);
            $table->year('fecha');
            $table->string('productora');

            $table->timestamp(Obra::CREATED_AT);
            $table->timestamp(Obra::UPDATED_AT);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
