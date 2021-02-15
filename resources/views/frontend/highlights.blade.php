                




<div class="wrapper style3" id="articulosDeOpinion">
      <div class="title">Artículos de opinión</div>
          <div class="row 150%">
           
@if ( !$posts->count() )
 <section class="container">
                   <header class="style1">
                                        <h2>Actualmente no existe ningún artículo publicado .</h2>
                                        <p>En breve podrá disponer de contenido en esta sección.</p>
                                    </header>
            
               
 </section>
@else
    @foreach( $posts as $post )
         <div class="4u 12u(mobile)">
                <section class="highlight">

                    @if($post->imagen)<img  class="image featured" src="{{url(config('upload.imagesurl').$post->imagen) }}">@endif

                    

                    <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a></h3>
            
                        <article>
                            {!! str_limit($post->body, $limit = 200, $end = '....... <a href='.url("/".$post->slug).'>Leer Más</a>') !!}
                        </article>
                            <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

                </section>
                
        </div>
    @endforeach
 
        </div>
          <ul class="actions actions-centered">
                <li><a href="{{ url('blog/articulos-de-opinion') }}" class="button style1 big">Leer Más artículos</a></li>
          </ul>

@endif
       </div>
</div>

                
        
<!-- original

<div id="ArticulosdeOpinion" class="wrapper style3">
      <div class="title">Artículos de opinión</div>
          
                   <div class="row 150%">
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/catedralDeLeon.jpg" alt="" /></a>
                                    <h3><a href="#">Título Artículo Uno</a></h3>
                                    <p>Descripción Artículo Uno Descripción Artículo UnoDescripción Artículo UnoDescripción Artículo UnoDescripción Artículo Uno .</p>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Leer más</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/catedralDeLeon.jpg" alt="" /></a>
                                    <h3><a href="#">Título Artículo dos</a></h3>
                                    <p>Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem.</p>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Leer más</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/catedralDeLeon.jpg" alt="" /></a>
                                    <h3><a href="#">Título Artículo tres</a></h3>
                                    <p>Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem.</p>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Leer más</a></li>
                                    </ul>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
fin Original-->