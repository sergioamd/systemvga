<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SitecontatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 9999-9999';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Seja bem vindo ao sistema';
        $contato->save();*/

        /*usando o metodo factory
        *chamamos o metodo factory ja configurado
        *e passamos quantas vezes queremos que esta factory
        *seja executada
        */
        factory(SiteContato::class, 100)->create();
    }
}
