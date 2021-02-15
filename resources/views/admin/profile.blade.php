@extends('app')

@section('title')
{{ $user->name }}
@endsection
@section('Header')

		@include('frontend.header')
@stop
@section('content')
<div class="wrapper style3">
	
    <div class="title">Ficha de Usuario</div>
    <div id="highlights" class="container">


	<ul class="list-group">
		<li class="list-group-item">
			Ultima conexión : {{$user->created_at->format('M d,Y \a\t h:i a') }}
		</li>
		<li class="list-group-item panel-body">
			<table class="table-padding">
				<style>
					.table-padding td{
						padding: 3px 8px;
					}
				</style>
				<tr>
					<td>Total Articulos Creados</td>
					<td> {{$posts_count}}</td>
					@if($author && $posts_count)
					<td><a href="{{ url('/my-all-posts')}}">Ver Artículos</a></td>
					@endif
				</tr>
				<tr>
					<td>Articulos Publicados</td>
					<td>{{$posts_active_count}}</td>
					@if($posts_active_count)
					<td><a href="{{ url('/user/'.$user->id.'/posts')}}">Ver Artículos</a></td>
					@endif
				</tr>
				<!--<tr>
					<td>Artículos Pendiente de Publicar </td>
					<td>{{$posts_draft_count}}</td>
					@if($author && $posts_draft_count)
					<td><a href="{{ url('my-drafts')}}">Ver Artículos</a></td>
					@endif
				</tr>-->
			</table>
		</li>
		<li class="list-group-item">
			Total Comments {{$comments_count}}
		</li>
	</ul>
    </div>
</div>

<div class="panel panel-default">
	<div class="panel-heading"><h3>Latest Posts</h3></div>
	<div class="panel-body">
		@if(!empty($latest_posts[0]))
		@foreach($latest_posts as $latest_post)
			<p>
				<strong><a href="{{ url('/'.$latest_post->slug) }}">{{ $latest_post->title }}</a></strong>
				<span class="well-sm">On {{ $latest_post->created_at->format('M d,Y \a\t h:i a') }}</span>
			</p>
		@endforeach
		@else
		<p>You have not written any post till now.</p>
		@endif
	</div>
</div>

<!--<div class="panel panel-default">
	<div class="panel-heading"><h3>Latest Comments</h3></div>
	<div class="list-group">
		@if(!empty($latest_comments[0]))
		@foreach($latest_comments as $latest_comment)
			<div class="list-group-item">
				<p>{{ $latest_comment->body }}</p>
				<p>On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
				<p>On post <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ $latest_comment->post->title }}</a></p>
			</div>
		@endforeach
		@else
		<div class="list-group-item">
			<p>You have not commented till now. Your latest 5 comments will be displayed here</p>
		</div>
		@endif
	</div>
</div>-->
@endsection
@section('Footer')

		@include('frontend.footer')
@stop
