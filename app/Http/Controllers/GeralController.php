<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GeralController extends Controller
{

    public function index()
    {


        $filos = DB::table('filos')->get();



        $vetor[0] = 10;

        $vetor[1] = 20;

        $vetor[] = 30;




        return view('index', compact('filos'));
        echo $vetor[2];
    }
    public function a()
    {
        return view('index');
    }
}