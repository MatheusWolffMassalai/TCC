<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\topicos_artigos;
use App\Models\userAcessoArtigo;

use App\Models\Exercicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class ExercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($id == 0) {
            $exercicios = DB::table('exercicios')->get();
        } else {
            $exercicios = DB::table('exercicios')->where('id_filo', $id)->get();
        }
        $x = 0;
        $z = 0;
        $y = 0;
        $m = 0;
        while ($x == $y || $x == $z || $x == $m || $y == $z || $y == $m || $z == $m) {
            $x = rand(0, 3);
            $y = rand(0, 3);
            $z = rand(0, 3);
            $m = rand(0, 3);
        }


        $listas = array(1, 1, 1, 1);
        //    $errou = explode(";", $exercicios[0]->respostas_erradas);

        $listas[$x] = "resposta_certa";
        $listas[$y] = "resposta_errada1";
        $listas[$z] = "resposta_errada2";
        $listas[$m] = "resposta_errada3";






        return view('exercicio', compact('exercicios', 'listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filos = DB::table('filos')->get();
        return view('criarExercicio', compact('filos'));
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

        Exercicio::create([
            'id_filo' => $data['id_filo'],
            'pergunta' => $data['pergunta'],
            'resposta_certa' => $data['resposta_correta'],
            'resposta_errada1' => $data['resposta_errada1'],
            'resposta_errada2' => $data['resposta_errada2'],
            'resposta_errada3' => $data['resposta_errada3'],
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
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $dados = $request;
        $exercicios = DB::table('exercicios')->where('id', $dados['id'])->get();
        //echo $dados['resposta'];
        //echo $exercicios;
        $user = User::find($id);

        // echo $dados['lista'];
        $listas = array(1, 1, 1, 1);
        $listas[0] = $dados["0"];
        $listas[1] = $dados["1"];
        $listas[2] = $dados["2"];
        $listas[3] = $dados["3"];
        if ($dados['resposta'] == $exercicios[0]->resposta_certa) {
            $exercicios_novos = Auth::user()->exercicios_resolvido + 1;
            $user->update(['exercicios_resolvidos' => $exercicios_novos]);
            echo "parabens";
        } else {
            echo "errado";
        }
        print_r($listas);

        return view("exercicio", compact("exercicios", "listas"));
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