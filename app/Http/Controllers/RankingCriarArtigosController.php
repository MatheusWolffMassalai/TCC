<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\topicos_artigos;
use App\Models\Artigo;
use App\Models\userAcessoArtigo;

use App\Models\Exercicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class RankingCriarArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dicionarios = [];
        $rankings = DB::table('users')->get();

        $table->integer('artigos_visitados');
        $table->integer('edicoes_verificadas');
        $table->integer('artigos_criados');
        $table->integer('edicoes_sugeridas');
        $table->integer('edicoes_aceitas');
        $table->integer('exercicios_resolvidos');
        $table->integer('exercicios_criados');

        //  for ($i = 0; $i < count($rankings); $i++) {

        //     $rankings[$i]->password = $rankings[$i]->artigos_visitados + $rankings[$i]->edicoes_aceitas + $rankings[$i]->exercicios_resolvidos;
        //     $rankings[$i]->banido = $i;

        foreach ($rankings as $ranking) {
            $pontuaçao = $ranking->artigos_criados;
            $dicionarios[$ranking->name] = $pontuaçao;
            arsort($dicionarios);
        }
        //  }

        print_r($dicionarios);
        return view('rankingGeral', compact('rankings', 'dicionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}