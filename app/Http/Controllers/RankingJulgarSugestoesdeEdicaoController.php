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

class RankingJulgarSugestoesdeEdicaoController extends Controller
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


        //  for ($i = 0; $i < count($rankings); $i++) {

        //     $rankings[$i]->password = $rankings[$i]->artigos_visitados + $rankings[$i]->edicoes_aceitas + $rankings[$i]->exercicios_resolvidos;
        //     $rankings[$i]->banido = $i;

        foreach ($rankings as $ranking) {
            $pontuaçao = $ranking->edicoes_verificadas;
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