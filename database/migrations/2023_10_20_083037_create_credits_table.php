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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('credit_type_id');
            $table->double('amount');
            $table->integer('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status');
            $table->unsignedBigInteger('accepted_by');
            $table->dateTime('accepted_at');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('credits', function(Blueprint $table){
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            
            $table->foreign('credit_type_id')
                ->references('id')
                ->on('credit_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('accepted_by')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
