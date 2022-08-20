@extends('templateInicio')


@section('content')

<div class="container filosInicio">
    <div class="row"> 
    @foreach ($filos as $filo)
        <div class="col vai_filo">
            <a href="{{ url('/filos/'.$filo->id) }}"><h2 class="filosTextos">{{$filo->nome_filo}} </h2> </a>
           
        </div>
        <!--<div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"> <h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo" >
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>
        <div class="col vai_filo">
            <a href="{{ url('/filos') }}"><h2 class="filosTextos">filos</h2> </a>
        </div>  -->
    @endforeach 
    </div>
</div>


@endsection
