<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Secuela;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('secuelas', function (Blueprint $table) {
            $table->foreignId('saga_id')->constrained();
            $table->foreignId('obra_id')->constrained();
            $table->integer('orden')->unsigned();

            $table->unique(['obra_id', 'saga_id', 'orden']);

            $table->timestamp(Secuela::CREATED_AT);
            $table->timestamp(Secuela::UPDATED_AT);

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
        Schema::dropIfExists('secuelas');
    }
};
