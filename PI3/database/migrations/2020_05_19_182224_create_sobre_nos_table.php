<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobreNosTable extends Migration
{
    public function up()
    {
        Schema::create('sobre_nos', function (Blueprint $table)
        {
            $table->id();
            $table->string('pagina')->default('');
            $table->string('titulo')->default('');
            $table->mediumText('texto')->default('');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sobre_nos');
    }
}
