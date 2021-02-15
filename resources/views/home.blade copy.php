@extends('app')

@section('title')
		{{$title}}
@endsection

@section('Header')

		@include('frontend.header')
@stop


@section('Main')

		@include('frontend.main')
@stop


@section('Intro')

		@include('frontend.intro')
@stop


@section('Highlights')

		@include('frontend.highlights')
@stop
@section('Footer')

		@include('frontend.footer')
@stop
