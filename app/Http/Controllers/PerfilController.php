<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create', 'update', 'destroy']);
    }
    public function index()
    {
        // $usuarios = DB::table('users')->where('id' , auth()->user()->id)->get(); 
        if (strcmp(auth()->user()->type, 'especialista') == 0) {

            echo "especialista";
        }


        return view('perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $dados = $request->except('imagem');
        $imagem = $request->file('imagem');
        $user = User::find($id);

        if ($request->hasFile('imagem')) {

            $nome = "imagem/{$user->getAttributes()['imagem']}";
            if ($nome != "padrao.png") {
                File::delete($nome);
                $extensao = "." . $imagem->extension();
                $novonome = md5(time()) . $extensao;
                $imagem->move('imagem', ($novonome));
                $teste = array('imagem' => $novonome);


                $update2 = $user->update($teste);
            }
        }



        //  $this->validate($request, $receita->rules, $receita->messages);


        //  $dataForm = $request->except('imagem');

        //  $produto = Produto::find($id);
        // $this->validate($request, $produto->rules, $produto->messages);
        //  $update = $produto->update($dataForm);

        $update = $user->update(['name' => $dados["nome"]]);
        //  return redirect()->route('perfil.index');//->with(['erros'=> 'Falha ao editar']);

        // $Atualiza = User::where('id', '=', Auth::user()->id)->update(['name' => $dados -> "nome"]);


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