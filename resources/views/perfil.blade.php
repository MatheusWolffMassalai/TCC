@extends('templatePrincipal')

@section('content')
<div class="container artigo">
       

                <img src="https://img.freepik.com/fotos-gratis/imagem-aproximada-em-tons-de-cinza-de-uma-aguia-careca-americana-em-um-fundo-escuro_181624-31795.jpg?w=2000">
                <h1> {{Auth::user()->name}}  </h1>
                <p></p>
                Artigos visitados: XXX
                <p></p>
                Artigos editados: XXX
                <p></p>
                {{Auth::user()->curriculo}}
                <p></p>
                {{Auth::user()->email}}
                <p></p>
                <h2>Conquistas</h2>
        
    
    

    

</div>


@endsection
