<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\topicos_artigos;
use App\Models\sugestao_edicao;
<<<<<<< HEAD
use File;
=======

>>>>>>> 60d187fa72402630d228fcb25d68949cf27a3950
use App\Models\User;

class EdicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'index', 'create', 'store', 'edit', 'update']);
    }
    public function index()
    {
<<<<<<< HEAD
        $filos = DB::table('sugestao_edicaos')->where('especialista_id', '=', Auth::user()->id)->where('aceita', '=', false)->get();
=======
        $filos = DB::table('sugestao_edicaos')->where('especialista_id', '=', Auth::user()->id)->where('aceita', '=', false )->get();
>>>>>>> 60d187fa72402630d228fcb25d68949cf27a3950
        $antigos = DB::table('topicos_artigos')->where('id', '=', $filos[0]->id_topico)->get();
        echo $filos;
        return view('confirmaredicao', compact('filos', 'antigos'));
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
    public function update(Request $request)
    {
        if (strcmp(auth()->user()->type, 'especialista') == 0) {

            $dados = $request;
            //$user = User::find($request);

            $imagem = $request->file('imagem');

            $top = topicos_artigos::find($dados['confirma']);

<<<<<<< HEAD
            //   echo $top;
            $nome = "imagem/{$top->getAttributes()['imagem']}";

            File::delete($nome);
            $filos = DB::table('sugestao_edicaos')->where('id_topico', '=', $top['id'])->where('aceita', '=', false)->get();
=======
         //   echo $top;
            $filos = DB::table('sugestao_edicaos')->where('id_topico', '=', $top['id'])->get();
>>>>>>> 60d187fa72402630d228fcb25d68949cf27a3950
            echo $filos;
            $suges = sugestao_edicao::find($filos[0]->id);
            $usuario2 = User::find($filos[0]->user_id); // DB::table('users')->where('id', '=', $filos[0]->user_id)->get();
            // echo $usuario2;
            $usuario3 = User::find(Auth::user()->id);
            $usuario3->update(['edicoes_verificadas' => $usuario3->edicoes_verificadas + 1]);
            $edicoes_novos = $usuario2->edicoes_aceitas + 1;
            $usuario2->update(['edicoes_aceitas' => $edicoes_novos]);


            $top->update(['imagem' => $filos[0]->imagem]);
<<<<<<< HEAD

            $top->update(['texto' => $filos[0]->texto]);

=======
>>>>>>> 60d187fa72402630d228fcb25d68949cf27a3950
            $suges->update(['aceita' => true]);
        }

        // echo $filos[0]->texto;
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