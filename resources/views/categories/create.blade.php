@extends('app')

@section('title')
$title
@endsection
@section('Header')

        @include('frontend.header')
@stop

@section('content')


<div class="wrapper style3">
    <div class="title">{{ $title }}</div>
    <div id="highlights" class="container">
        <section id="intro" class="container">
            <p class="style1">Desde esta sección podra crear , guardar y editar {{ $title }}</p>
                    
        </section>
        <ul><li class="btn btn-success">
        <a href="{{ url('/user/categories') }}" >Ver todas las Categorias</a>
        </li></ul>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
        <form action="{{ url('/nueva-categoria')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input required="required" value="{{ old('title') }}" placeholder="Introduzca nombre de categoria" type="text" name = "title"class="form-control" />
            </div>

            @if($errors->first('title'))
                <span class="errors">{{ $errors->first('title') }}</span>
            @endif
            <input type="submit" name='publish' class="btn btn-success" value = "Crear"/>

        </form>
    </div>
</div>
@endsection