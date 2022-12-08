@extends('templatePrincipal')
@section('content')

<div class="container" id="formulario">

    @foreach ($topicos as $topico)

    <!-- <form id="form"  class="was-validated">-->
    {!! Form::model($topico, ['route' => ['filos.update',['filo' => $topico->id]], 'id' => 'form', 'method' =>
    'put','enctype'=>'multipart/form-data']) !!}
    @csrf
    @method('put')





    <div class="form-row ">
        <div class="col">
            <span>Titulo do tópico: </span>
            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Nome:', 'readonly']) !!}
            <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Por favor, coloque o seu usuário.</div>

        </div>
        <div class="col">
            <span>Texto do tópico:</span>
            {!! Form::textarea('texto', null, ['class' => 'form-control','id'=> 'ajuda' , 'placeholder' =>
            'Descrição:']) !!}
            <div class="valid-feedback">Válido.</div>
            <div class="invalid-feedback">Por favor, coloque um Email válido.</div>
        </div>

    </div>

    <div class="col">

        <span>Referências:</span>
        {!! Form::textarea('referencias', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque seu cpf.</div>
    </div>


    <div class="col">

        <span>Mudar imagem:</span>
        {!! Form::file('imagem', ['class' => 'form-control']) !!}

        <div class="valid-feedback">Válido.</div>
        <div class="invalid-feedback">Por favor, coloque uma imagem.</div>
    </div>




    <div class="form-row">
        <div class="col-6">
            <div>

                {!! Form::hidden('id', $topico->id) !!}
                {!! Form::hidden('user', Auth::user()->id) !!}
                {!! Form::submit('Enviar', ['class' => 'btn btn-lg btn-block', 'id' =>'enviar']) !!}

            </div>
        </div>

        {!! Form::close() !!}
    </div>
    @endforeach
</div>

<script src="../../../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ajuda'))
    .catch(error => {
        console.error(error);
    });
</script>

@endsection