<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="MeuStilo/js/MeuJs.js"></script>
        <title>Painel-ADM</title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="MeuStilo/css/estiloSidebar.css">
        <link rel="stylesheet" href="MeuStilo/css/estiloPag.css">
        <style>
        	.fundo{
        		 background-image: url("img/login.jpg");
        		  background-size:100% 100%;
                height: 100%;
                width: 100%;
                position:absolute;
        	}
        	.formLogin{
        		margin-top:200px;
        	}
    	</style>
</head>
<body>
	   
			<div class="container-fluid fundo">
					<div class="row">
						<div class="col-md-4 col-md-offset-8 formLogin">
							<form action="php/validar.php" method="post">
								<div class="input-group input-group-lg">
									  <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
									  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" name="usuario">
								</div>
								<br>
								<div class="input-group input-group-lg">
									  <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
									  <input type="password" class="form-control" placeholder="Senha" aria-describedby="sizing-addon1"  name="senha">
								</div>
									<br>
								 <button type="submit" class="btn btn-danger btn-lg">Logar</button>
							</form>
                            <?php
                                 
                                if(isset($_SESSION['consultar'])){
                                    echo "<p>Erro ao Logar</p>";     
                                }
                            ?>
						</div> 
					</div>
                    
			</div>
		  
</body>
</html>