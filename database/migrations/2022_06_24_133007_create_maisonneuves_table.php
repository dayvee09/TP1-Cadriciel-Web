<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonneuvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisonneuves', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('adresse', 100);
            $table->string('phone', 20);
            $table->string('email', 50)->unique();
            $table->string('ddn', 20);
            // $table->foreign('ville_id')->references('id')->on('villes');
            $table->timestamps();

            $table->foreignId('ville_id')
                ->constrained("villes")
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maisonneuves');
    }
}
