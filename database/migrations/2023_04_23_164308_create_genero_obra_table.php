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
        Schema::create('genero_obra', function (Blueprint $table) {

            $table->enum('genero_id', ['Pelicula de culto', 'Accion', 'Animacion', 'Aventuras', 'Belico', 'Ciencia Ficcion', 'Cine Negro', 'Comedia', 'Documental', 'Drama', 'Fantastico', 'Infantil', 'Intriga', 'Musical', 'Romance', 'Serie de TV', 'Terror', 'Thriller', 'Western', 'Deportiva', 'Historica', 'Crimen', 'Policiaca', 'Religiosa', 'Cine mudo', 'Biografico', 'Erotico', 'Experimental', 'Propagandistico', 'Serie B', 'Road Movie', 'Cortometraje']);
            $table->foreign('genero_id')->references('genero_id')->on('generos');
            $table->foreignId('obra_id')->constrained();

            $table->unique(['genero_id', 'obra_id']);

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
        Schema::dropIfExists('genero_obra');
    }
};
