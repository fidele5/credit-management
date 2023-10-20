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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('agent_position_id');
            $table->unsignedBigInteger('created_by');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('agents', function(Blueprint $table){
            $table->foreign('person_id')->references('id')
                ->on('people')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('agent_position_id')->references('id')
                ->on('agent_positions')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('created_by')->references('id')
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
        Schema::dropIfExists('agents');
    }
};
