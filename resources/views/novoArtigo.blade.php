@extends('templatePrincipal')

@section('content')
<div class="form-row ">
    {!! Form::open( ['url' => 'artigo/salvar', 'id' => 'form', 'method' =>
    'post','enctype'=>'multipart/form-data']) !!}
    @csrf
    @method('post')
    <select name="id_filo" class="form-select" aria-label="Default select example">
        @for($i=0; $i < count($filos_usados_certo); $i++) <option value={{$filos_usados_certo[$i]}}>
            {{$filos_usados_nome_certo[$i]}}
            </option>

            @endfor
    </select>
    <div class="col">
        <span>Pergunta: </span>
        {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'pergunta']) !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque o seu usuário.</div>

    </div>
    <div class="col">
        <span>Texto do tópico:</span>
        {!! Form::textarea('texto', null, ['class' => 'form-control','id'=> 'ajuda' , 'placeholder' => 'Descrição:'])
        !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque um Email válido.</div>
    </div>

</div>
<div class="form-row">

    <div class="col">

        <span>Referências:</span>
        {!! Form::textarea('referancias', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque seu cpf.</div>
    </div>


</div>
<div class="form-row">
    <div class="col-6">
        <div>

            {!! Form::submit('Enviar', ['class' => 'btn btn-lg btn-block' , 'id' => 'enviar']) !!}

        </div>
    </div>

    {!! Form::close() !!}
</div>










@endsection