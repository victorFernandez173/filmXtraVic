<?php

use App\Models\Critica;
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
        Schema::create('criticas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('critica', 5000);
            $table->timestamp(Critica::CREATED_AT)->useCurrent();
            $table->timestamp(Critica::UPDATED_AT)->useCurrent();

            $table->unique(['obra_id', 'user_id']);

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
        Schema::dropIfExists('criticas');
    }
};
