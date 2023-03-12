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
        Schema::create('states', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('acronym')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedTinyInteger('country_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
