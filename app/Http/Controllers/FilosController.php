<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\topicos_artigos;
use App\Models\userAcessoArtigo;

use App\Models\forum_artigo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;


class FilosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
    }
    public function index($id)
    {
        $filos = DB::table('filos')->where('id', $id)->get();

        $artigos = DB::table('artigo')->where('id_filo', $filos[0]->id)->get();

        $topicos = DB::table('topicos_artigos')->where('artigo_id', $artigos[0]->id)->get();

        $forums = DB::table('forum_artigos')->where('artigo_id', $artigos[0]->id)->orderByDesc('id')->get();


        if (auth()->user()) {

            $acesso_antigo = DB::table('user_acesso_artigos')->where('user_id', auth()->user()->id)->get();

            // $dia = date("Y-m-d") - $acesso_antigo[0]->data;
            //    $date1 = date("Y-m-d H:i:s");
            //   $date2 = $acesso_antigo[0]->data;
            //  $diff = abs(strtotime($date1) - strtotime($date2)) / 86400;

            //  $acesso_antigo[0]->data;
            ///$interval = $date1->diff($date2);

            if ($acesso_antigo != "[]") {
                $date1 = date("Y-m-d H:i:s");
                $date2 = $acesso_antigo[0]->data;
                $diff = abs(strtotime($date1) - strtotime($date2)) / 86400;

                $acesso_antigo[0]->data;

                if ($diff >= 7) {
                    $acess =  userAcessoArtigo::find($acesso_antigo[0]->id);
                    $acess->delete();

                    $acesso = new userAcessoArtigo;
                    $acesso->artigo_id = $artigos[0]->id;
                    $acesso->data = date("Y-m-d H:i:s");
                    $acesso->user_id =  Auth::user()->id;
                    $acesso->save();
                }
            } else {
                $acesso = new userAcessoArtigo;
                $acesso->artigo_id = $artigos[0]->id;
                $acesso->data = date("Y-m-d H:i:s");

                $acesso->user_id =  Auth::user()->id;



                $acesso->save();
            }
        }


        return view('artigos', compact('topicos', 'forums', 'artigos', 'filos'));
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




        $topicos = DB::table('topicos_artigos')->where('id', $id)->get();

        return view('editarartigo', compact('topicos'));
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
        $dados = $request->except('imagem');
        $imagem = $request->file('imagem');

        $top = topicos_artigos::find($id);


        if ($request->hasFile('imagem')) {

            $nome = "imagem/{$top->getAttributes()['imagem']}";
            if ($nome != "padrao.png") {
                File::delete($nome);
                $extensao = "." . $imagem->extension();
                $novonome = md5(time()) . $extensao;
                $imagem->move('imagem', ($novonome));
                $teste = array('imagem' => $novonome);


                $update2 = $top->update($teste);
            }
        }


        //$this->validate($request, $receita->rules, $receita->messages);
        //  $topico = $topicos[0];
        $update = $top->update(['texto' => $dados['texto']]);


        return redirect()->route('index');
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