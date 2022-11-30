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
use App\Models\sugestao_edicao;
use App\Models\novos_topico;
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
        $this->middleware('auth')->only(['store', 'index', 'create', 'store', 'edit', 'update']);
    }
    public function index($id)
    {
        $filos = DB::table('filos')->where('id', $id)->get();

        $artigos = DB::table('artigo')->where('id_filo', $filos[0]->id)->get();

        $topicos = DB::table('topicos_artigos')->where('artigo_id', $artigos[0]->id)->get();

        $forums = DB::table('forum_artigos')->where('artigo_id', $artigos[0]->id)->orderByDesc('id')->get();


        if (auth()->user()) {

            $acesso_antigo = DB::table('user_acesso_artigos')->where('user_id', '=', auth()->user()->id)->where('artigo_id', '=', $artigos[0]->id)->get();


            $user = User::find(Auth::user()->id);

            echo $acesso_antigo;
            if ($acesso_antigo != "[]") {


                $date1 = date("Y-m-d H:i:s");
                $date2 = $acesso_antigo[0]->data;
                $diff = abs(strtotime($date1) - strtotime($date2)) / 86400;

                $acesso_antigo[0]->data;

                if ($diff >= 7) {
                    $acess =  userAcessoArtigo::find($acesso_antigo[0]->id);
                    $acess->delete();

                    $visitas_novas = Auth::user()->artigos_visitados + 1;

                    $user->update(['artigos_visitados' => $visitas_novas]);

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
                $visitas_novas = Auth::user()->artigos_visitados + 1;

                $user->update(['artigos_visitados' => $visitas_novas]);


                $acesso->save();
            }
        }

        echo $filos;
        return view('artigos', compact('topicos', 'forums', 'artigos', 'filos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $filos = DB::table('filos')->where('id', $id)->get();


        return view('criarTopico', compact('filos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $filos = DB::table('artigo')->where('nome_filo', $request['id_filo'])->get();

        echo $filos;
        novos_topico::create([

            'user_id' => Auth::user()->id,
            'especialista_id' => 2,
            'texto' => $request['texto'],
            'aceito' => false,
            'imagem' => $request['user'],
            'artigo_id' => $filos[0]->id,
            'titulo' => $request['titulo'],
            //'referencias' => $request['referencias']


        ]);
        //  topicos_artigos::create([
        //      'artigo_id' => $filos[0]->id,
        //      'texto' => $request['texto'],
        //      'titulo' => $request['titulo'],
        //     'imagem' => $request['user'],
        //     'aceito' => false,
        //     'referencias' => $request['referencias']
        //  ]);
        echo  $request['texto'];
        // echo $request['referancias'];
        // echo  $request['titulo'];
        // echo  $request['user'];

        // ]);
        return view('perfil');
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

            if ("a" != "padrao.png" and "a" != "") {
                File::delete($nome);
                $extensao = "." . $imagem->extension();
                $novonome = md5(time()) . $extensao;
                $imagem->move('imagem', ($novonome));



                //  $update2 = $imagem->update($teste);
            } else {
                $extensao = "." . $imagem->extension();
                $novonome = md5(time()) . $extensao;
                $imagem->move('imagem', ($novonome));
            }
        }
        print_r($dados);
        sugestao_edicao::create([
            'id_topico' => $dados['id'],
            'user_id' => $dados['user'],
            'especialista_id' => 1,
            'texto' => $dados['texto'],
            'aceita' => false,
            'imagem' => $novonome,

        ]);
        //$this->validate($request, $receita->rules, $receita->messages);
        //  $topico = $topicos[0];
        $user = User::find(Auth::user()->id);
        //$update = $top->update(['texto' => $dados['texto']]);
        $sugestoes_novas = Auth::user()->edicoes_sugeridas + 1;

        $user->update(['edicoes_sugeridas' => $sugestoes_novas]);

        /// return redirect()->route('index');
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