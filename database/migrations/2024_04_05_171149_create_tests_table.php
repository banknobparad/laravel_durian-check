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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2024_04_05_171151_create_tests_table.php
            $table->string('test');
========
>>>>>>>> b6efda6a75856731e4a1363fb712f5f2a7e94d45:database/migrations/2024_04_05_171149_create_tests_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
