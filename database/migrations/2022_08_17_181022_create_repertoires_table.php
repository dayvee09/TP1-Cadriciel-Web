<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepertoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repertoires', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('url');
            $table->timestamps();
            $table->foreignId('r_m_id')
                ->constrained("maisonneuves")
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
        Schema::dropIfExists('repertoires');
    }
}
