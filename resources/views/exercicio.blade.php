@extends('templatePrincipal')

@section('content')
{!! Form::open(['route'=> ['exercicio.edit', ['exercicio' => 1]], 'id' => 'form', 'method' =>
'get','enctype'=>'multipart/form-data']) !!}
@foreach ($exercicios as $exercicio)
<div class="titulo">
    <h1> {{$exercicio->pergunta}} </h1>
    {!! Form::hidden('id', $exercicio->id ) !!}
    @csrf
    @foreach ($listas as $lista) <div class="from-check">
        {!! Form::radio($exercicio->id, $exercicio->$lista ) !!}
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