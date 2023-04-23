<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->enum('genero_id', ['Pelicula de culto', 'Accion', 'Animacion', 'Aventuras', 'Belico', 'Ciencia Ficcion', 'Cine Negro', 'Comedia', 'Documental', 'Drama', 'Fantastico', 'Infantil', 'Intriga', 'Musical', 'Romance', 'Serie de TV', 'Terror', 'Thriller', 'Western', 'Deportiva', 'Historica', 'Crimen', 'Policiaca', 'Religiosa', 'Cine mudo', 'Biografico', 'Erotico', 'Experimental', 'Propagandistico', 'Serie B', 'Road Movie', 'Cortometraje'])->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generos');
    }
};
