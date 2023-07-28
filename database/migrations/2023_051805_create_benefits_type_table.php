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
        Schema::create('benefits-type', function (Blueprint $table) {
            $table->id();
//            $table->string('image');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('benefits_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefits_type_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();

            $table->unique(['benefits_type_id', 'locale']);
            $table->foreign('benefits_type_id')->references('id')->on('benefits-type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_type_translations');
        Schema::dropIfExists('benefits-type');
    }
};
