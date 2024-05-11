<?php
//php artisan migrate:refresh --path=/database/migrations/2024_05_10_165826_create_checkdatas_table.php
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
        Schema::create('checkdatas', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('gap_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkdatas');
    }
};
