@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">
        <a href="{{ url('/rankinggeral/') }}">
            <h2 class="filosTetos">ranking geral </h2>
        </a>
        <a href="{{ url('/rankingcriarartigos/') }}">
            <h2 class="filosTetos">ranking criar artigos </h2>
        </a>
        <a href="{{ url('/rankingcriarexercicios/') }}">
            <h2 class="filosTetos">ranking criar exercicios </h2>
        </a>
        <a href="{{ url('/rankingjulgarsugestoesdeedicao/') }}">
            <h2 class="filosTetos">ranking julgar sugestoes de edicao </h2>
        </a>
        <a href="{{ url('/rankingresolucaoexercicios/') }}">
            <h2 class="filosTetos">ranking resolucao exercicios </h2>
        </a>
        <a href="{{ url('/rankingedicoesfeitas/') }}">
            <h2 class="filosTetos">ranking edicoes feitas </h2>
        </a>
        @foreach ($dicionarios as $key => $dicionario)

        <div class="categorias">


            {{$dicionario}}
            {{$key}}


        </div>

        @endforeach






        @endsection