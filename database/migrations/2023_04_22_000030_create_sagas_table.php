<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Saga;

return new class extends Migration
{
    /**
     * Migrar.
     */
    public function up(): void
    {
        Schema::create('sagas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);

            $table->timestamp(Saga::CREATED_AT)->useCurrent();
            $table->timestamp(Saga::UPDATED_AT)->useCurrent();
        });
    }

    /**
     * Anular migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('sagas');
    }
};
