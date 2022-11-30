@extends('templatePrincipal')

@section('content')
<div class="container artigo">




    <div class=" gerais">

        @foreach ($novos as $novo)

        <div class="categorias">



        </div>


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
        @endforeach
        <a href="{{ url('/confirmar/') }}"> confirmar </a>







    </div>
</div>


@endsection