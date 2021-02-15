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
                <a href="{{ url('/auth/register') }} " class="button style3 big">Añadir Usuario</a>
            </li>
        </ul>

    <table class="responstable">
        <thead>
            <tr>
                <th>Fecha Creación</th>
                <th>nombre</th>
                <th>email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user )

                <tr>
                    <td>{{ $user->created_at->format('M d,Y \a\t h:i a') }}</td>
                    <td>
                        {{$user->name}}     
                    </td>
                    <td>
                         {{$user->email}}   
                    </td>
                    <td>
                        <ul class="">
                            <li><a href="{{  url('user/edit/'.$user->id) }}" class="button2 style12">Editar</a></li>
                            <li><a href="{{  url('user/delete/'.$user->id) }}" class="button2 style2 small2">Eliminar </a></li>

            </ul>
        </td>
                </tr>
                        
            @endforeach
            
            {!! $users->render() !!}
        </tbody>
    </table>
  








    </div>
</div>



@endsection