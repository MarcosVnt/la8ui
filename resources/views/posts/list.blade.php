@extends('app')


@section('Header')

        @include('frontend.header')
@stop



@section('content')
<script type="text/javascript">

$(document).ready(function(){
    $("select#categoria_id").change(function(e){
        //$('#categoria_id').on('change', function(e){
        console.log(e);
        var cat_id = e.target.value;
        $.get('/categoria/lista?cat_id='+cat_id, function(data){
            //console.log(data);
            $('#subcategoria_id').empty();
            $.each(data, function(index, subcatObj){

                $('#subcategoria_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');

            });
        });

   })
});

</script>

<div class="wrapper style3">
    <div class="title">Artículos de opinión</div>
    <div id="highlights" class="container">




@if ( !$posts->count() )

	<div>No hay ningún Articulo disponible . Disculpe las molestias.</div>
    <form  method="GET" action="{{ url('/user/'.Auth::id().'/posts') }}">
    	     <input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="6u 6u(mobile)">
				<input type="text" name="filtro" value="{{ old('filtro') }}" id="filtro" placeholder="Búsqueda por título, vacío busca todos" />
				<input type="submit" class="btn btn-info" value="Enviar" />
			</div>

    </form>
@else
<div class="wrapper style3">
	@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Revise los datos Enviados<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
        
        @endif
             @if(Session::has('message'))
      				 <div class="alert alert-info">
         			 {{Session::get('message')}}
        			</div>
    		@endif
 	<ul>
        <li>
        <a href="{{ url('/new-post') }}" class="btn btn-info">Añadir Nueva Entrada - {{Auth::id()}}</a>
        </li> 

    </ul>
    <form  method="GET" action="{{ url('/user/'.Auth::id().'/posts') }}">
    	     <input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				 {!! Form::Label('Filtro', 'Filtro Búsqueda:') !!}
				<div class="form-group)">
					<input type="text" name="filtro" value="{{ old('filtro') }}" id="filtro" placeholder="Búsqueda por título" />
					
				            

					<select class="form-control" name="categoria_id" id="categoria_id">
                        <option  value="0" selected>Seleccione Categoría</option>

		                @foreach($categorias as $category)
		                   
		                      <option value="{{$category->id}}">{{$category->name}}</option>


		                @endforeach
		            </select>
                    
				</div>
				
			</div>
			<input type="submit" class="btn btn-info" value="Buscar" />
			 
    </form>
	<table class="responstable">
	        <thead>
	            <tr>
	                <th>Imagen</th>
	                <th>Titulo</th>
	                <th>Contenido</th>
	                <th>Creado</th>
	                <th>Acciones</th>
	                
	            </tr>
	        </thead>
	        <tbody>
	        


	@foreach( $posts as $post )
	<tr>
			<td>@if($post->imagen)<img src="{{url(config('upload.imagesurl').$post->imagen) }}">@endif</td>

			<td><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a></td>
			<td>{!! str_limit($post->body, $limit = 10, $end = '....... <a href='.url("/".$post->slug).'>Leer Más</a>') !!}</td>
			<td>{{ $post->created_at->format('M d,Y \a\t h:i a') }}</td>
			<td>
				@if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
					@if($post->active == '1')
					<button class="btn btn-success" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
					<button class="btn btn-danger" style="float: right"><a href="{{ url('delete/'.$post->id)}}">Eliminar Post</a></button>

					@else
					<button class="btn btn-info" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
					@endif
				@endif
			
			
			</td>
			
	</tr>


	@endforeach
	{!! $posts->render() !!}


	        </tbody>
	    </table>

</div>
@endif


    </div>
</div>

@endsection