@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">
        <a href="{{ url('/rankinggeral/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        <a href="{{ url('/rankingartigosvisitados/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        <a href="{{ url('/rankingcriarartigos/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        <a href="{{ url('/rankingcriarexercicios/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        <a href="{{ url('/rankingjulgarsugestoesdeedicao/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        <a href="{{ url('/rankingresolucaoexercicios/') }}">
            <h2 class="filosTetos">a </h2>
        </a>
        @foreach ($dicionarios as $key => $dicionario)

        <div class="categorias">


            {{$dicionario}}
            {{$key}}


        </div>

        @endforeach






        @endsection