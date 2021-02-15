@extends('app')


@section('Header')

        @include('frontend.header')
@stop



@section('content')

<div class="wrapper style3">
 

    <div class="title">{{$title}}</div>
@if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
        <ul>
            <li>
                <a href="{{ url('/nueva-categoria') }} " class="button style3 big">Añadir Categoria</a>
            </li>
        </ul>

    <table class="responstable">
        <thead>
            <tr>
                <th>Fecha Creación</th>
                <th>Descripcion de la categoria </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $categories as $category )

                <tr>
                    <td>{{ $category->created_at->format('M d,Y \a\t h:i a') }}</td>
                    <td>
                        <ul>
                            <li>{{$category->name}}<li>
                            <li style="background-color:#167F92; color:#fff">Subcategorias</li>   
                            <li>
                                @if($category->subcategories)
                               <ul style="list-style: none; padding: 0">
                                    @foreach($category->subcategories as $uno)
                                        <li class="panel-body">
                                           
                                                    <p>{{ $uno->name }}  
                                                    -  <a href="{{  url('subcategory/delete/'.$uno->id) }}" class="button2 style12">Eliminar</a></p>
                                              
                                        </li>
                                    @endforeach
                                </ul> 

                                @endif
                                
                            </li>
                         </ul>
                    </td>
                    <td>
                        <ul class="">
                            <li><a href="{{  url('categoria/edit/'.$category->id) }}" class="button2 style12">Editar</a></li>
                            <li><a href="{{  url('categoria/delete/'.$category->id) }}" class="button2 style2 small2">Eliminar </a></li>
                            <li>
                                <!--ALTA DE SUBCATEGORIAS-->
                                <div class="panel-body">
                                    <form method="post" action="/subcategory/add">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="on_category" value="{{ $category->id }}">
                                        <input type="hidden" name="category" value="{{ $category->name }}">
                                        <div class="form-group">
                                            <textarea required="required" placeholder="Introduzca nombre subcategoria" name = "body" class="form-control" style="min-height:1em"></textarea>
                                        </div>
                                        <input type="submit" name='subcategoria' class="btn btn-success" value = "SubCategoria"/>
                                    </form>
                                </div>
                            </li>

            </ul></td>
                    <!--<td>{{ $category->created_at->diffForHumans() }} </td>-->
                </tr>
                        
            @endforeach
            
            {!! $categories->render() !!}
        </tbody>
    </table>
  



  <!-- <div id="highlights" class="container">

        <ul>
            <li>
                <a href="{{ url('/nueva-categoria') }}">Añadir Categoria</a>
            </li>
        </ul>
        <?php 
        /*echo "holaaaaaaaaaaaaaaaaaaaaaaaa "; 
        echo $_SERVER['DOCUMENT_ROOT'] ;
        echo $_SERVER['SERVER_NAME'];
        var_dump($categories);*/
        ?>


@if ( !$categories->count() )
No hay categorias disponibles . 
@else



    @foreach( $categories as $category )
    <div class="12u 12u(mobile)">
        
        <div class="highlight">
            <p>Editar - Eliminar </p>
            <h3>{{ $category->name }} </h3>
            <p>{{ $category->created_at->format('M d,Y \a\t h:i a') }} </p>
            <ul class="actions">
                <li><a href="#" class="button style1">Editar</a></li>
                <li><a href="#" class="button style1">Eliminar</a></li>

            </ul>
        </div>
        
        <hr>
    </div>
    @endforeach
    {!! $categories->render() !!}
@endif
-->







    </div>
</div>



@endsection