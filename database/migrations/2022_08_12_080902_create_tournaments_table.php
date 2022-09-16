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
        Schema::create('tournaments', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('event_name');
            $table->integer('max_participant');
            $table->foreignIdFor(\App\Models\Address::class);
            $table->date('date');
            $table->integer('number_participant');
            $table->boolean('full')->virtualAs('max_participant LIKE number_participant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};
