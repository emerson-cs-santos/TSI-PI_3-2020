<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SobreNosSeeder extends Seeder
{
    public function run()
    {
        DB::table('sobre_nos')->insert([
            'pagina' => 'quemSomos',
            'titulo' => 'Somos jogadores',
            'texto' => 'Texto padrão',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('sobre_nos')->insert([
            'pagina' => 'contato',
            'titulo' => 'Fale conosco!',
            'texto' => 'Texto Padrão',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
