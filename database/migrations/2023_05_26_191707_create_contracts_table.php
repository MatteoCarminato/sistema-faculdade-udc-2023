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
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('resp_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('payment_term_id');
            $table->enum('status', ['pendente', 'confirmado', 'cancelado'])->default('pendente');
            $table->decimal('monthly_fee', 8, 2);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('resp_id')->references('id')->on('clients');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('payment_term_id')->references('id')->on('payment_terms');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
