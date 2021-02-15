                <div id="header-wrapper" class="wrapper">
                    <div id="header">

                        <!-- Logo -->
                            <div id="logo">
                                <h1><a href="{{ url('/') }}">Notaría Ordoño 16</a></h1>
                                <p>Francisco Enrique Ledesma Muñiz</p>
                            </div>

                        <!-- Nav -->
                            <nav id="nav">
                                <ul>
                                    <li class="current"><a href="{{ url('quienes-somos') }}">Quienes Somos</a></li>
                                    <li><a href="{{ url('blog/modelos') }}">Modelos</a></li>
                                    <li><a href="{{ url('/#articulosDeOpinion') }}">Artículos de Opinión</a></li>

                                    <li>
                                        <a href="{{ url('/#DocumentacionNotarial')}}">Documentación Notarial</a>
                                        <ul>
                                            
                                            <li>
                                                <a href="{{ url('/escrituras')}}">Escrituras</a>
                                                <ul>
                                                    <li><a href=" {{ url('/agrupacion')}}">Agrupación</a></li>
                                                    <li><a href=" {{ url('/alquiler')}}">Alquiler</a></li>
                                                    <li><a href=" {{ url('/escrituras')}}">Cancelación Hipoteca</a></li>

                                                    <li><a href=" {{ url('/capitulaciones')}}">Capitulaciones</a></li>
                                                    <li><a href=" {{ url('/cesion-de-bienes')}}">Cesión de Bienes a[...] </a></li>
                                                    <li><a href=" {{ url('/compraventa')}}">Compraventa</a></li>
                                                    <li><a href=" {{ url('/division')}}">División</a></li>
                                                    <li><a href=" {{ url('/division-horizontal')}}">División Horizontal</a></li>
                                                    <li><a href=" {{ url('/divorcio')}}">Divorcio</a></li>
                                                    <li><a href=" {{ url('/herencia')}}">Herencia</a></li>
                                                    <li><a href=" {{ url('/hipoteca')}}">Hipoteca</a></li>
                                                    <li><a href=" {{ url('/matrimonio')}}">Matrimonio</a></li>
                                                    <li><a href=" {{ url('/novacion-hipoteca')}}">Novación Hipoteca</a></li>
                                                    <li><a href=" {{ url('/obra-nueva')}}">Obra Nueva</a></li>

                                                    <li><a href=" {{ url('/reconocimiento-de-deuda')}}">Reconocimiento de deuda</a></li>
                                                    <li><a href=" {{ url('/renta-vitalicia')}}">Renta Vitalícia</a></li>
                                                    <li><a href=" {{ url('/segregacion')}}">Segregación</a></li>

                                                    <li><a href=" {{ url('/servidumbre')}}">Servidumbre</a></li>
                                                    <li><a href=" {{ url('/sociedades')}}">Sociedades</a></li>
                                                    <li><a href=" {{ url('/subrogacion-hipoteca')}}">Subrogación Hipoteca</a></li>
                                                    <li><a href=" {{ url('/testamento')}}">Testamento</a></li>
                                                    <li><a href=" {{ url('/usufructo')}}">Usufructo</a></li>


                                                </ul>
                                            </li>
                                            <li>
                                                <a href=" {{ url('/actas')}}">Actas</a>
                                                <ul>
                                                    <li><a href=" {{ url('/declaracion-herederos')}}">Declaración herederos</a></li>
                                                    <li><a href=" {{ url('/expedientes-inmatriculacion')}}">Expedientes inmatriculación</a></li>
                                                    <li><a href=" {{ url('/manifestaciones')}}">Manifestaciones</a></li>
                                                    <li><a href=" {{ url('/presencia')}}">Presencia</a></li>
                                                    <li><a href=" {{ url('/remision-documentos')}}">Remisión documentos [...]</a></li>


                                                </ul>
                                            </li>

                                            <li>
                                                <a href=" {{ url('/testimonios')}}">Testimonios</a>
                                                <ul>
                                                    <li><a href=" {{ url('/exhibicion')}}">Exhibición.</a></li>
                                                    <li><a href=" {{ url('/legitimacion-de-firmas')}}">Legitimación de Firmas</a></li>

                                                </ul>
                                            </li>                               
                                            <li><a href=" {{ url('/polizas')}}">Pólizas</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="{{ url('/#footer-wrapper')}}">Contacto</a></li>
                                    
                            
                                @if (Auth::guest())
                                <li>
                                    <a href="{{ url('/auth/login') }}">Login</a>
                                </li>
                                
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @if (Auth::user()->can_post())
                                        <li>
                                            <a href="{{ url('/user/categories') }}">Mis Categorias</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/new-post') }}">Añadir Nueva Entrada</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/user/'.Auth::id().'/posts') }}">Lista de Entradas</a>
                                        </li>
                                        
                                        <!--<li>
                                            <a href="{{ url('/user/'.Auth::id()) }}">Datos de usuario</a>
                                        </li>-->
                                        <li>
                                            <a href="{{ url('/auth/register') }}">Registrar Nuevo Usuario</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/user/list') }}">Lista de usuarios</a>
                                        </li>


                                        @endif
                                        <li>
                                            <a href="{{ url('/auth/logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                            </nav>



                    </div>


                </div>

