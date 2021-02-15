		<!-- Main -->
				<div class="wrapper style2">
					<div class="title">{{$title}}</div>
					<div id="main" class="container">

						<!-- Content -->
							<div id="content">
								<div class="row 150%">
									@if(count($posts) > 0)
									 @foreach( $posts as $post )
								         <div class="4u 12u(mobile)">
								                <section class="box">
								                	<header>
														<h2>{{ $post->title }}</h2>
													</header>							                    
							                        <!--<a href='{{ url("/".$post->slug)}}' class="image featured"><img src="../images/Koala.jpg" alt="" /></a>-->
			@if($post->imagen)<img src="{{url(config('upload.imagesurl').$post->imagen) }}">@endif


								                        <article>
								                            {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Leer Más</a>') !!}
								                        </article>
								                            <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

								                </section>
								                
								        </div>
								     @endforeach
                                    @else
                                    <div class="container">
								                
                                    <header class="style1">
										<h2>Actualmente no existe ningún artículo publicado .</h2>
										<p>En breve podrá disponer de contenido en esta sección.</p>
									</header>
									</div>	
                                    @endif

								</div>
							</div>

					</div>
				</div>