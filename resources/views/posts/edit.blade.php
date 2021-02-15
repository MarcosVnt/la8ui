@extends('app')

@section('title')
Editar un post 
@endsection
@section('Header')

        @include('frontend.header')
@stop

@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
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
<script type="text/javascript">
    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    }); 
</script>
<div class="wrapper style3">
    <div class="title">Artículos de opinión </div>
    <div id="highlights" class="container">
       <header class="style1"> 
        
        <h2>
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
        @if (isset($message) and count($message >0))
        {{$message or "no hay mensage"}}
        @endif
  {{$message or "Editando Artículo"}}
        </h2>
    </header>
            {!! Form::open(['url' => '/update','method' => 'post', 'files' => true]) !!}


       
            <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
            <p>{{$post->category_id}} - {{$post->subcategory_id}}</p>
             <div class="form-group">

             {!! Form::Label('categoria', 'Categoria:') !!}
              <select class="form-control" name="categoria_id" id="categoria_id">


                @foreach($categorias as $category)
                    @if($post->category_id == $category->id)
                      <option  value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                      <option value="{{$category->id}}">{{$category->name}}</option>

                    @endif

                @endforeach
              </select>

            </div>
            <div class="cascade" id="street"></div>
            <div class="form-group">
              {!! Form::Label('subcategoria', 'SubCategoria:') !!}
              <select class="form-control" name="subcategoria_id" id="subcategoria_id">
                 @if($post->subcategory_id==0)
                    <option  value="{{$post->subcateory_id}}" selected>No hay ..</option>

                @else
                    @foreach($subcategorias as $subcategory)
                        @if($post->subcategory_id == $subcategory->id)
                          <option  value="{{$subcategory->id}}" selected>{{$subcategory->name}}</option>
                        @else
                           @if($post->subcategory_id == 0)
                                   <option value="0" default>Seleccione una Categoría </option>

                           @else
                                   <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                           @endif
                        @endif
                    @endforeach
                @endif

              </select>
            </div>
          
            {!! Form::Label('titulo', 'Titulo:') !!}
            <div class="form-group">
                <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
            </div>



            <div class="form-group">
                <label for="">Imagen destacada: </label><br/>
                 @if(isset($post->imagen))
                <img src="{{url(config('upload.imagesurl').$post->imagen) }}">
                @else
                <img src="">
                @endif

                {!! form::file('imagen',['class' => 'form-group','name'=>'img','value'=>old('img')]) !!}
                @if($errors->first('imagen'))
                    <span class="errors"> {{ $errors->first('imagen')}} </span>
                @endif
            </div>
                        {!! Form::Label('Contenido', 'Contenido') !!}

            <div class="form-group">
                <textarea name="content" sytle="width:100%">

                    @if(!old('body'))
                    {!! $post->body !!}
                    @endif
                    {!! old('body') !!}
                </textarea>
            </div>
            @if($post->active == '1')
            <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
            @else
            <input type="submit" name='publish' class="btn btn-info" value = "Publish"/>
            @endif
            <input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />

            <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="button btn-danger">Delete</a>
            <a href="{{ url('/user/'.Auth::id().'/posts') }}" class="button btn-info" >Lista de Entradas</a>


        </form>
    </div>
</div>
@endsection