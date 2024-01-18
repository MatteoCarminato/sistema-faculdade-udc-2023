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
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('phone_code')->nullable();
            $table->unsignedTinyInteger('state_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('state_id')
            ->references('id')
            ->on('states')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
