@extends('templatePrincipal')

@section('content')
<div class="container artigo">


    @foreach ($artigos as $artigo)
    @foreach ($filos as $filo)
    <div class="titulo">
        <h1> {{$artigo->nome_filo}} </h1>
        <a href="{{ url('/exercicio/mostrar/'.$filo->id) }}">
            <button class="exercicio"> Exercicios</button>
        </a>
    </div>
    @endforeach
    @endforeach

    <p></p>
    <div class=" gerais">

        @foreach ($topicos as $topico)

        <div class="categorias">

            <div>
                <h3> {{$topico->titulo}} </h3>
            </div>


            <div>


                {!! Form::open(['route' => ['filos.edit', ['filo' => $topico->id]], 'id' => 'editar','method' =>
                'get','enctype'=>'multipart/form-data']) !!}
                @csrf

                {!! Form::submit('Editar', ['class' => 'btn btn-lg btn-block']) !!}
                {!! Form::close() !!}


            </div>




        </div>


        <div class="row">
            <div class="col">

                <div class="img">
                    <div class="card img-corpo" display="none">
                        <div class="card-body">
                            <img class="img-topico" src={{asset('imagem/'.$topico->imagem )}}>
                        </div>
                    </div>
                </div>
                <p></p>
                <p>

                    {!! $topico->texto !!}


                    @endforeach
                    {!! Form::open(['url' => 'criartopico/'.$filos[0]->id, 'id' => 'editar','method'
                    =>
                    'get','enctype'=>'multipart/form-data']) !!}
                    @csrf

                    {!! Form::submit('adicionar tópico', ['class' => 'btn btn-lg btn-block']) !!}
                    {!! Form::close() !!}
                </p>
            </div>



        </div>

        <div class=" comentario">
            @foreach ($artigos as $artigo)
            Escreva seu comentário:
            {!! Form::open(['route' => ['comentario.store', ['comentarium' => $artigo->id]], 'id' => 'comentar',
            'method'
            =>'post','enctype'=>'multipart/form-data']) !!}

            @csrf



            {!! Form::textarea('mensagem', null, ['class' => 'form-control','value' => '1', 'rows' => '2']) !!}


            {{ Form::hidden('artigo_id', $artigo->id) }}
            {{ Form::hidden('filo_id', $artigo->id_filo) }}



            {!! Form::submit('Comentar', ['class' => 'btn btn-lg btn-block']) !!}
            {!! Form::close() !!}
            @endforeach

            @foreach ($forums as $forum)
            <div class="comentarios">
                <p>
                    <img class="img-perfil" src={{asset('imagem/'.$forum->user_imagem)}}>
                    {{$forum->user_name}}
                    {{$forum->user_id}}<br>
                    {{$forum->mensagem}}
                </p>
            </div>
            @endforeach



        </div>
    </div>





    @endsection