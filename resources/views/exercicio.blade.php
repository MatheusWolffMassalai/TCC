@extends('templatePrincipal')

@section('content')
{!! Form::open(['route'=> ['exercicio.edit', ['exercicio' => 1]], 'id' => 'form', 'method' =>
'get','enctype'=>'multipart/form-data']) !!}
@foreach ($exercicios as $exercicio)
<div class="titulo">
    <h1> {{$exercicio->pergunta}} </h1>
    {!! Form::hidden('id', $exercicio->id ) !!}
    {!! Form::hidden('0', $listas[0] ) !!}
    {!! Form::hidden('1', $listas[1] ) !!}
    {!! Form::hidden('2', $listas[2] ) !!}
    {!! Form::hidden('3', $listas[3] ) !!}

    @csrf
    @foreach ($listas as $lista) <div class="from-check">
        {!! Form::radio('resposta', $exercicio->$lista ) !!}
        <label class="form-check-label" for={{$exercicio->id}}>

            {{$exercicio->$lista}}

        </label>

    </div>
    @endforeach




</div>
@endforeach
{!! Form::submit('editar', ['class' => 'btn btn-lg btn-block']) !!}
{!! Form::close() !!}













@endsection