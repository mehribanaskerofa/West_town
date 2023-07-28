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
        Schema::create('finishings', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('finishing_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finishing_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['finishing_id', 'locale']);
            $table->foreign('finishing_id')->references('id')->on('finishings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finishing_translations');
        Schema::dropIfExists('finishings');
    }
};
