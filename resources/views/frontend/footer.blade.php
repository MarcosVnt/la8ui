				<div id="footer-wrapper" class="wrapper">
					<div class="title">Contacto</div>
					<div id="footer" class="container">
						<header class="style1">
							<h2>¿Alguna consulta , duda o comentario?</h2>
							<p>
								Para cualquier consulta , duda  o comentario utilice cualquiera de los siguientes canales.<br />
								Complete el siguiente formulario y nos pondremos en contacto con usted a la mayor brevedad posible.
							</p>
						</header>
						<hr />
						<div class="row 150%">
							<div class="6u 12u(mobile)">

								<!-- Contact Form -->
						<section>

                        <form  method='POST' action='{{ url("/sendemail") }}'>
        	            <input type="hidden" name="_token" value="{{ csrf_token() }}">


          @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            
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
        
												<div class="row 50%">
												<div class="6u 12u(mobile)">
													<input type="text" name="name" value="{{ old('name') }}"  id="contact-name" placeholder="Nombre" />
												</div>
												<div class="6u 12u(mobile)">
													<input type="text" name="email" value="{{ old('email') }}" id="contact-email" placeholder="Email" />
												</div>
											</div>
											<div class="row 50%">
												<div class="12u">
													<textarea name="mensaje" id="contact-mensaje"  placeholder="Mensaje" rows="4">{{{ old('mensaje') }}}</textarea>
												</div>
											</div>
                                            <div class="row 50%">
												<div class="12u">
													              {!! Form::Label('destinatarios', 'Seleccione un destinatario:') !!}

													<select name="destinatario" id="destinatario">
														<option value="info@notariaordono16.es">Información General</option>
														<option value="copias@notariaordono16.es">Copias</option>
														<option value="contabilidad@notariaordono16.es">Contabilidad</option>
														<option value="polizas@notariaordono16.es">Polizas</option>
													</select>
												</div>
											</div>


											<div class="row">
												<div class="12u">
													<ul class="actions">
														<li><input type="submit" class="style1" value="Enviar Mensaje" /></li>
													</ul>
												</div>
											</div>
										</form>
											  
										
									</section>

							</div>
							<div class="6u 12u(mobile)">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="12u 12u(mobile)">
												<section>
													<h3 class="icon fa-home">Dirección Postal</h3>
													<p>
														Notaría Ordoño 16<br />
														C/ Ordoño II 16 1º Dcha.<br />
														24001 - León (España)
													</p>
												</section>
											</div>
											<!--<div class="6u 12u(mobile)">
												<section>
													<h3 class="icon fa-comment">Social</h3>
													<p>
														<a href="#">@twitter</a><br />
														<a href="#">facebook.com/untitled</a>
													</p>
												</section>
											</div>-->
										</div>
										<div class="row">
											<div class="6u 12u(mobile)">
												<section>
													<h3 class="icon fa-envelope">Email</h3>
													<p>
														info@notariaordono16.es
													</p>
												</section>
											</div>
											<div class="6u 12u(mobile)">
												<section>
													<h3 class="icon fa-phone">Teléfonos</h3>
													<p>
														(034) 987 96 86 06
													</p>
												</section>
											</div>
										</div>
										<div class="row">
											<div class="12u 12u(mobile)">
												<section>
													<h3 class="icon fa-clock-o">Horario </h3>
													<p>
														Mañanas : Lunes a Vienes de 8:30 a 15:00
													</p>
													<p>
                                                        Tardes : Lunes , Martes, Miercoles y Jueves de 16:30 a 19:00	

													</p>
												</section>
											</div>
											
										</div>

									</section>

							</div>
						</div>
						<hr />
					</div>
					<div id="copyright">
						<ul>
							<!--<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>-->
							<li>&copy; Notaria Ordoño 16 (2015)</li><li>Todos los derechos resevados</li>
						</ul>
					</div>
				</div>

