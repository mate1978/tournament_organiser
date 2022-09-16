<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tournament::class)->constrained();
            $table->foreignIdFor(\App\Models\Round::class)->constrained();
            $table->foreignId('participant_id1')->references('id')->on('participants');
            $table->foreignId('participant_id2')->references('id')->on('participants');
            $table->foreignId('winner')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
