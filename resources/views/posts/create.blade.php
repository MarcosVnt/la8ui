@extends('app')

@section('title')
Añadir nuevo Post
@endsection
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



<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

<script type="text/javascript">
    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    }); 
</script>
<div class="wrapper style3">
    <div class="title">Artículos de opinión</div>
    <div id="highlights" class="container">
        
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
             @if (isset($message))
                        <div class="alert alert-info">
                            {{$message or "-"}}
                        </div>
        
        @endif

        <!--<form action="/new-post/store" method="post">-->
        {!! Form::open(['url' => 'new-post/store','method' => 'post', 'files' => true]) !!}
            <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->

            <div class="form-group">

              {!! Form::Label('categoria', 'Categoria:') !!}
              <select class="form-control" name="categoria_id" id="categoria_id">
                  <option value="{{ old('categoria_id') }}" default>Seleccione una Categoría</option>
                
                @foreach($categorias as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>

            </div>
            <div class="form-group">
              {!! Form::Label('subcategoria', 'SubCategoria:') !!}
              <select class="form-control" name="subcategoria_id" id="subcategoria_id">
                <option value="{{ old('subcategoria_id') }}" default>Seleccione una SubCategoría</option>

                @foreach($subcategorias as $subcategory)
                  <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
              </select>
            </div>
          
            {!! Form::Label('titulo', 'Titulo:') !!}

            <div class="form-group">
                <input required="required" value="{{ old('title') }}" placeholder="Escriba el título" type="text" name = "title" class="form-control" />
            </div>


            <div class="form-group">
                <label for="">Imagen destacada: </label><br/>
                {!! form::file('imagen',['class' => 'form-group']) !!}
                @if($errors->first('imagen'))
                    <span class="errors"> {{ $errors->first('imagen')}} </span>
                @endif
            </div>

            {!! Form::Label('Contenido', 'Contenido') !!}

            <div class="form-group" >
                <textarea name='body'class="form-control">{{ old('body') }}</textarea>
            </div>
            <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
            <input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
        {!! Form::close() !!}
    </div>
</div>
@endsection


