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
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('infrastructures_type_id')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('infrastructures_type_id')->references('id')->on('infrastructures-type')->onDelete('cascade');
        });
        Schema::create('infrastructure_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('infrastructure_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->unique(['infrastructure_id', 'locale']);
            $table->foreign('infrastructure_id')->references('id')->on('infrastructures')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure_translations');
        Schema::dropIfExists('infrastructures');
    }
};
