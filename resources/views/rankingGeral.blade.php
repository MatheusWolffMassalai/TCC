@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">

        @foreach ($dicionarios as $key => $dicionario)

        <div class="categorias">


            {{$dicionario}}
            {{$key}}


        </div>

        @endforeach






        @endsection