<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnPrecoItemPedidos extends Migration
{
    public function up()
    {
        Schema::table('item_pedidos', function (Blueprint $table) {
            $table->decimal('preco',8,2)->change();
        });
    }

    public function down()
    {
        Schema::table('item_pedidos', function (Blueprint $table) {
            $table->decimal('preco',5,2)->change();
        });
    }
}
