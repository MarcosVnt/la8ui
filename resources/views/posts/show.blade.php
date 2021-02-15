@extends('app')


@section('Header')

        @include('frontend.header')
@stop




<!--@section('title')
	@if($post)
		{{ $post->title }}
		@if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
			<button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
		@endif
	@else
		Page does not exist
	@endif
@endsection



@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection-->

@section('content')

<div class="wrapper style2">
    <div class="title">{{ $post->title }}</div>
    <div id="main" class="container">

@if($post)

    <!-- Content -->
	    <div id="content">
		    <article class="box post">
				   <header class="style1">
				   		<h2>{{ $post->title }}<br class="mobile-hide" /></h2>
				   	@if($post->categoriaNombre->name=='Menu')

				   	@else
							<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} creado por {{ $post->author->name }}</p>
						<h2><br class="mobile-hide" />{{$post->categoriaNombre->name}} @if ($post->subcategory_id) <br class="mobile-hide" /> {{$post->subcategoriaNombre->name}} @endif</h2>
						@if($post->imagen)<img src="{{url(config('upload.imagesurl').$post->imagen) }}">@endif
					@endif
					</header>
					<div class ="image featured">
						{!! $post->body !!}
					</div>


			</article>
		</div>


	
@else
404 error
@endif
    </div>
</div>

@stop


@section('Footer')

		@include('frontend.footer')
@stop
