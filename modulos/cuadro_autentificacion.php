
<!-- Blog Search Well -->
                <div class="well boxaute">
                  
 <?php
if(1==1)
	{
?>                       <h4>Identificarse <span class="label label-default">Usuario</span></h4>
                        	
                            <div class="form-bottom">
			                    <form role="form" name="autentificacion" action="<?php echo $loginFormAction; ?>" method="POST" class="login-form">
			                    	<div class="form-group">
	
			                        	<input type="text" name="form-username" placeholder="Ingrese su usuario" class="form-username form-control" id="form-username" required>
			                        </div>
			                        <div class="form-group">
			                        	
			                        	<input type="password" name="form-password" placeholder="Ingrese su C.I." class="form-password form-control" id="form-password" required>
			                        </div>
									<?php
if(isset($_GET['errorAute']))
			{
				echo"<div class=\"alert alert-danger\" role=\"alert\">Error!! Intente de nuevo</div>";
			}
?>
									
			                        <button type="submit" class="btn cuadrobotonAute"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Autentificarse</button>
			                    </form>
		                    </div>
							
							<?php
	}
	else{
		echo"<div class=\"alert alert-info\" role=\"alert\">Este servicio no esta disponible por el momento</div>";
	}
?>
                       
                </div>