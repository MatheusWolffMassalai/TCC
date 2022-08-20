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

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filos_usados = array();
        $filos_usados_nome = array();
        $filos_usados_certo = array();
        $filos_usados_nome_certo = array();
        $artigos = DB::table('artigo')->get();
        $filos = DB::table('filos')->get();
        foreach ($filos as $filo) {
            array_push($filos_usados, $filo->id);
            array_push($filos_usados_nome, $filo->nome_filo);
        }



        foreach ($artigos as $artigo) {
            $key = array_search($artigo->id_filo, $filos_usados);
            if ($key !== false) {
                unset($filos_usados[$key]);
                unset($filos_usados_nome[$key]);
            }
        }
        foreach ($filos_usados as $filo) {
            array_push($filos_usados_certo, $filo);
        }
        foreach ($filos_usados_nome as $filo) {
            array_push($filos_usados_nome_certo, $filo);
        }
        print_r($filos_usados_certo);
        $filos = DB::table('filos')->where('id', '!=', $artigos[0]->id_filo)->get();

        return view('novoArtigo', compact('filos_usados_certo', 'filos_usados_nome_certo'));
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
        $data = $request;



        $filos = DB::table('filos')->where('id', $data['id_filo'])->get();
        DB::table('artigo')->insert([
            'id_filo' => $data['id_filo'],
            'nome_filo' => $filos[0]->nome_filo,
            'referencias' => $data['texto'],

        ]);
        $artigos = DB::table('artigo')->where('id_filo', $filos[0]->id)->get();

        topicos_artigos::create([
            'artigo_id' => $artigos[0]->id,
            'titulo' => $data['titulo'],
            'texto' => $data['texto'],

        ]);
        return redirect()->route('index');
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