@extends('templatePrincipal')

@section('content')
<div class="container artigo">


    <h1> <img class="img-perfil" src={{asset('imagem/'.Auth::user()->imagem)}}>

        {{Auth::user()->name}}

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
            Altere nome ou imagem
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nome ou Imagem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['perfil.update', Auth::user()->id], 'class' => 'form','method' =>
                        'put', 'enctype'=>'multipart/form-data']) !!}
                        @csrf
                        {!! Form::text('nome'); !!}
                        {!! Form::file('imagem', ['class' => 'form-control']) !!}

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        {!! Form::submit('Enviar'); !!}
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>


        <a href="{{ url('/novotopico/') }}">
            <h2 class="filosTextos">a </h2>
        </a>
    </h1>
    <p></p>
    Artigos visitados: {{Auth::user()->artigos_visitados}}
    <p></p>
    Artigos editados: {{Auth::user()->edicoes_aceitas}}
    <p></p>
    Exercicios resolvidos: {{Auth::user()->exercicios_resolvidos}}
    <p></p>
    {{Auth::user()->curriculo}}
    <p></p>
    {{Auth::user()->email}}
    <p></p>
    <h2>Conquistas</h2>






</div>


@endsection