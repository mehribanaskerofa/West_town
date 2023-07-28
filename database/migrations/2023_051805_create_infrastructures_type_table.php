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
        Schema::create('infrastructures-type', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('infrastructures_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('infras_type_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();

            $table->unique(['infras_type_id', 'locale']);
            $table->foreign('infras_type_id')->references('id')->on('infrastructures-type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructures_type_translations');
        Schema::dropIfExists('infrastructures-type');
    }
};
