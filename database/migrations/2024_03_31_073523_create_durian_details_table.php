<?php
//php artisan migrate:refresh --path=/database/migrations/2024_03_31_073523_create_durian_details_table.php
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
        Schema::create('durian_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('docs_id');
            
            
            $table->string('name_our')->nullable();        
            $table->string('id_number_our')->nullable();    
            $table->string('house_number_our')->nullable();
            $table->string('districts_our')->nullable();
            $table->string('amphures_our')->nullable();
            $table->string('provinces_our')->nullable();
            $table->string('phone_number_our')->nullable();
            $table->string('rel_our')->nullable();
            $table->string('moo_our')->nullable();
            $table->string('soi_our')->nullable();
            $table->string('road_our')->nullable();

            $table->string('name_his')->nullable();
            $table->string('districts_his')->nullable();
            $table->string('provinces_his')->nullable();
            $table->string('amphures_his')->nullable();
            $table->string('gap_his')->nullable();
            $table->date('date_his')->nullable();
            $table->double('quantity_his')->nullable();
            $table->double('area_his')->nullable();
            $table->string('type_his')->nullable();
            $table->double('weight_his')->nullable();
            $table->string('moo_his')->nullable();
            $table->string('soi_his')->nullable();
            $table->string('road_his')->nullable();

            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('durian_details');
    }
};
