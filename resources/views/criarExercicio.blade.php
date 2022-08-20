@extends('templatePrincipal')

@section('content')
<div class="form-row ">
    {!! Form::open( ['url' => 'exercicio/store', 'id' => 'form', 'method' =>
    'post','enctype'=>'multipart/form-data']) !!}
    @csrf
    @method('post')
    <select name="id_filo" class="form-select" aria-label="Default select example">
        <option selected> A qual filo esse exercicio é relacionado </option>
        @foreach($filos as $filo)
        <option value={{$filo->id}}>{{$filo->nome_filo}}</option>

        @endforeach
    </select>
    <div class="col">
        <span>Pergunta: </span>
        {!! Form::text('pergunta', null, ['class' => 'form-control', 'placeholder' => 'pergunta']) !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque o seu usuário.</div>

    </div>
    <div class="col">
        <span>Resposta correta:</span>
        {!! Form::text('resposta_correta', null, ['class' => 'form-control', 'placeholder' => 'resposta correta']) !!}

        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque um Email válido.</div>
    </div>



    <div class="col">

        <span>Resposta incorreta 1</span>
        {!! Form::text('resposta_errada1', null, ['class' => 'form-control', 'placeholder' => 'resposta incorreta 1'])
        !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque seu cpf.</div>
    </div>


    <div class="col">

        <span>Resposta incorreta 2</span>
        {!! Form::text('resposta_errada2', null, ['class' => 'form-control', 'placeholder' => 'resposta incorreta 2'])
        !!}

        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque uma imagem.</div>
    </div>
    <div class="col">

        <span>Resposta incorreta 3</span>
        {!! Form::text('resposta_errada3', null, ['class' => 'form-control', 'placeholder' => 'resposta incorreta 3'])
        !!}

        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque uma imagem.</div>
    </div>


</div>
<div class="form-row">
    <div class="col">
        <div>

            {!! Form::submit('Enviar', ['class' => 'btn btn-lg btn-block', 'id' => 'enviar']) !!}

        </div>
    </div>

    {!! Form::close() !!}
</div>










@endsection