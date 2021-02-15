@extends('appRight')

@section('title')
		{{$title}}
@endsection

@section('Header')
		@include('frontend.header')
@stop


@section('Right')
		@include('frontend.right')
@stop

@section('Footer')
		@include('frontend.footer')
@stop
