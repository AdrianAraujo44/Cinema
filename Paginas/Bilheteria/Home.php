<?php
    include_once "../../php/conexao.php";
     session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="../../MeuStilo/js/MeuJs.js"></script>
        <title>Painel-Funcionario</title>
        <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css">
        
		<style type="text/css">
            .fundo{
                background-image: url("../../img/fundo-azul.jpg");
                background-size:100% 100%;
                height: 100%;
                width: 100%; 
            }
            
        </style>
        <script>
            function CalcularPreco(){
               var valor_radio     =document.getElementById('radio').value;
               var tipoInteira     =document.getElementById('tipoInteira').value;
               var tipoMeia        =document.getElementById('tipoMeia').value;
               var Meia = (valor_radio / 2)* tipoMeia;
               var preco = (valor_radio * tipoInteira)+ Meia;
               document.getElementById('precoTotal').value = preco;
            }
            function PrecoFinal(){
               var valor_radio     =document.getElementById('radio').value;
               var ValorRecebido   =document.getElementById('ValorRecebido').value;
               var precoTotal   =document.getElementById('precoTotal').value;
               
                document.getElementById('troco').value=ValorRecebido - precoTotal;
                
            }
        </script>
    </head>
    <body class="fundo">

          <div class="container-fluid ">
              <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <img src="../../img/logo-cinema.png" width="100" height="50" >
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#">22/11/2017</a></li>
                      <li><a href="#">11:40</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario']?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#" data-toggle="modal" data-target="#sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                        </ul>
                      </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
             </nav>
<br><br> <bR><br>
  <!--<center><h1>Filmes Disponíveis</h1></center>-->
              <div class="row">
                   <div class="col-md-10 col-md-offset-1">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                          <?php 
                              $sql="select * from filme";
                              $result =  mysqli_query($con,$sql);
                              $resultson = mysqli_num_rows($result);
                              while($resultson >0){
                                  echo"<li data-target='#carousel-example-generic' data-slide-to='0'></li>";
                                  $resultson--;
                             }
                          ?>
                                
                   
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                           <div class="row">
                            <div class="col-xs-4 col-xs-offset-2 col-md-6 col-md-offset-4">
                                   <img src="../../img/filmes/LigadaJustiça.jpg" class="thumbnail"  style="width: 300px; height: 400px;" alt="..."><br>
                            </div>
                        </div>
                          <div class="carousel-caption">

                      </div>
                    </div>
                     <?php 
                              $sql="select * from filme";
                              $resultado =  mysqli_query($con,$sql);
                              $resultado2 = mysqli_num_rows($resultado);
                              $resultado3 = $resultado2-1;
                              while($resultado3 >0){
                                $sql ="select * from filme";
                                $resultado =  mysqli_query($con,$sql);
                                while($row = mysqli_fetch_assoc($resultado)){
                                echo"<div class='item'>";
                                echo"<div class='row'>";
                                echo"<div class='col-xs-4 col-xs-offset-2 col-md-6 col-md-offset-4'>";
                                echo"<a href='' data-toggle='modal' data-target='#VendaBilhete".$row['Id_filme']."'><img src='../../img/filmes/".$row['img']."' class='thumbnail'  style='width:300px; height:400px; alt='...'></a><br>";
                                echo"</div>";
                                echo"</div>";
                                echo"<div class='carousel-caption'>";
                                echo"</div>";
                                echo"</div>";
                                echo'<div class="modal fade" id="VendaBilhete'.$row['Id_filme'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
  echo'<div class="modal-dialog" role="document">';
    echo'<div class="modal-content">';
      echo'<div class="modal-header">';
        echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo'<h4 class="modal-title" id="myModalLabel">Realizando Venda...</h4>';
      echo'</div>';
      echo '<form action="Venda_Bilhete.php" method="post">';
      echo'<div class="modal-body">';
             echo'<div class="input-group input-group-md">';
                  echo'<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-film"></span></span>
                  <input type="text" class="form-control" value="'.$row['nome_filme'].'" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">';
            echo'</div><br>';
            echo'<div class="form-inline">';
                  echo'<div class="table-responsive">';
                        echo'<table class="table table-striped table-bordered">';
                            echo'<thead>';
                              echo'<tr>';
                              echo'<th>Sala</th>';
                              echo'<th>Horario</th>';
                              echo'<th>Formato</th>';
                              echo'<th>Preço</th>';
                              echo'<th>Ação</th>';

                              echo'</tr>';
                            echo'</thead>';
                            echo'<tbody>';
                                $sql="select  s.id_sessao ,sa.nome_sala, s.preco , s.horario , df.dimensao from filme as f inner JOIN sessao as s on s.nome_filme = f.id_filme inner join sala as sa on sa.id_sala=s.sala inner join d_filme as df on df.id_dfilme = s.dimensao where s.nome_filme = ".$row['Id_filme'].""; 
                                $result =  mysqli_query($con,$sql);
                                while($ln = mysqli_fetch_assoc($result)){                             
                                echo'<tr>';
                                echo"<td>".$ln['nome_sala']."</td>";
                                echo"<td>".$ln['horario']."</td>";
                                echo"<td>".$ln['dimensao']."</td>";
                                echo"<td>".$ln['preco']."</td>";
                                echo"<td>".$ln['id_sessao']."</td>";
                                echo'<td><div class="input-group">
                                            <span class="input-group-addon">
                                              <input  id="palavra" value='.$ln['id_sessao'].' name="radio" type="radio" aria-label="...">
                                            </span>
                                        </div></td>';
                                echo'</tr>';
                              }
                            echo'</tbody>';

                        echo'</table>';
                    
            echo'</div><br>';
                    echo'<div id="dados">Aqui aparecerá os dados buscados...</div>';
                              echo'<button class="btn btn-default" id="buscar" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>';    
      echo'</div>';
      echo'<div class="modal-footer">';
        echo'<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
        echo'<button type="submit" class="btn btn-primary">Confirmar</button>';
      echo'</div>';
      echo'</form>';
    echo'</div>';
  echo'</div>';
echo'</div>';
echo'</div>';

 

                                  $resultado3--;
                                }
                             }
                          ?>
                  </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
                   </div>
                </div>
                <br><bR><br>

              
          </div><!-- /.container-fluid -->

       
          <?php include_once "../modal.php";?>
         <script src="../../Bootstrap/jquery/jquery.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="../../Bootstrap/js/bootstrap.js"></script>
          <script>
            function buscar(palavra)
            {
                var page = "../../php/teste.php";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#dados").html("Carregando...");
                            },
                            data: {palavra: palavra},
                            success: function (msg)
                            {
                                $("#dados").html(msg);
                            }
                        });
            }
            
            
            $('#buscar').click(function () {
                buscar($("#palavra").val())
            });
        </script>
    </body>
</html>