@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">

        @foreach ($novos as $novo)

        <div class="categorias">



        </div>
        {!! Form::open( ['url' => 'confirmar', 'id' => 'form', 'method' =>
        'post','enctype'=>'multipart/form-data']) !!}
        @csrf
        @method('post')

        <div class="row">
            <div class="col">

                <div class="img">
                    <div class="card img-corpo" display="none">
                        <div class="card-body">
                            <img class="img-titulo" src={{asset('imagem/'.$novo->imagem )}}>
                        </div>
                    </div>
                </div>
                <p></p>
                <p>

                    {!! $novo->texto !!}


                </p>
            </div>




        </div>
        {!! Form::hidden('id', $novo->id) !!}
        {!! Form::submit('Confirmar', ['class' => 'btn btn-lg btn-block' , 'id' => 'enviar']) !!}

        {!! Form::close() !!}
        @endforeach








    </div>
</div>


@endsection