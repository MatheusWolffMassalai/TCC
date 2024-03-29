@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">

        @foreach ($antigos as $antigo)

        <div class="categorias">



        </div>


        <div class="row">
            <div class="col">

                <div class="img">
                    <div class="card img-corpo" display="none">
                        <div class="card-body">
                            <img class="img-titulo" src={{asset('imagem/'.$antigo->imagem )}}>
                        </div>
                    </div>
                </div>
                <p></p>
                <p>

                    {!! $antigo->texto !!}


                </p>
            </div>




        </div>
        @endforeach
        @foreach ($filos as $filo)

        <div class="categorias">



        </div>


        <div class="row">
            <div class="col">

                <div class="img">
                    <div class="card img-corpo" display="none">
                        <div class="card-body">
                            <img class="img-titulo" src={{asset('imagem/'.$filo->imagem )}}>
                        </div>
                    </div>
                </div>
                <p></p>
                <p>

                    {!! $filo->texto !!}
                    @endforeach

                </p>
            </div>

            {!! Form::open(['url' => 'confirmaedicao/update',
            'id' => 'comentar','method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            {!! Form::hidden('texto', $filo->texto) !!}

            {!! Form::hidden('confirma', $filo->id_topico) !!}
            {!! Form::submit('Enviar', ['class' => 'btn btn-lg btn-block', 'id' => 'enviar']) !!}


            {!! Form::close() !!}

        </div>




        @endsection