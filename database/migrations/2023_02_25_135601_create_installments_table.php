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
        Schema::create('installments', function (Blueprint $table) {
            $table->primary(['payment_term_id', 'payment_form_id']);
            $table->unsignedTinyInteger('payment_term_id');
            $table->unsignedTinyInteger('payment_form_id');

            $table->integer('parcela');
            $table->integer('dias');
            $table->float('porcentual');

            $table->timestamps();
            $table->softDeletes();

            // Definir a chave estrangeira para a tabela payment_forms
            $table->foreign('payment_form_id')
                ->references('id')
                ->on('payment_forms')
                ->onDelete('cascade');

            // Definir a chave estrangeira para a tabela payment_terms
            $table->foreign('payment_term_id')
                ->references('id')
                ->on('payment_terms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
