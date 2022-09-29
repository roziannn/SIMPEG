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
        Schema::create('covids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip');
            $table->string('vaksin1')->nullable();;
            $table->string('vaksin2')->nullable();;
            $table->string('vaksin3')->nullable();;
            $table->string('tglVaksin1')->nullable();
            $table->string('tglVaksin2')->nullable();
            $table->string('tglVaksin3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covids');
    }
};
