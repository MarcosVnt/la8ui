@extends('appNoSidebar')

@section('title')
		{{$title}}
@endsection

@section('Header')
		@include('frontend.header')
@stop


@section('noSidebar')
		@include('frontend.noSidebar')
@stop

@section('Footer')
		@include('frontend.footer')
@stop
