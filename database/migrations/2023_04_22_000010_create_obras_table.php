<?php

use App\Models\Obra;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migrar.
     */
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 200);
            $table->string('titulo_original', 200);
            $table->string('pais', 60);
            $table->decimal('duracion', 3, 0, true);
            $table->string('sinopsis', 2500);
            $table->year('fecha');
            $table->string('productora', 255);

            $table->timestamp(Obra::CREATED_AT)->useCurrent();
            $table->timestamp(Obra::UPDATED_AT)->useCurrent();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Anular migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
