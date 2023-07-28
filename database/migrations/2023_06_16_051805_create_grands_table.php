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
        Schema::create('grands', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('grand_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grand_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['grand_id', 'locale']);
            $table->foreign('grand_id')->references('id')->on('grands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grand_translations');
        Schema::dropIfExists('grands');
    }
};
