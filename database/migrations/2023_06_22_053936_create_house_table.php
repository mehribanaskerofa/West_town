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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();//enum
            $table->integer('floor')->nullable();
            $table->integer('room')->nullable();//static
            $table->float('area')->nullable();
            $table->string('image')->nullable();
            $table->string('layout')->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('block_id')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('set null');

        });
        Schema::create('house_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();

            $table->unique(['house_id', 'locale']);
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_translations');
        Schema::dropIfExists('houses');
    }
};
