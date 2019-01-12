<?php
    include_once "../../php/conexao.php";
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
            .faixaProduto{
              background-color: black;
            }
            .formFundo{
               background-color:white;
              padding: 10px;
              border-radius: 10px;
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nome Funcionario <span class="caret"></span></a>
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
                <div class="col-md-11 col-md-offset-1">
                   <div class="col-md-5 ">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                          <?php 
                              $sql="select * from produto";
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
                            <div class="col-xs-4 col-xs-offset-2 col-md-6 col-md-offset-3">
                                   <img src="../../img/carrinho.png" class="thumbnail"  style="width: 300px; height: 300px;" alt="..."><br>
                            </div>
                        </div>
                          <div class="carousel-caption">

                      </div>
                    </div>
                     <?php 
                              $sql="select * from produto";
                              $resultado =  mysqli_query($con,$sql);
                              $resultado2 = mysqli_num_rows($resultado);
                              $resultado3 = $resultado2-1;
                              while($resultado3 >0){
                                $sql ="select * from produto";
                                $resultado =  mysqli_query($con,$sql);
                                while($row = mysqli_fetch_assoc($resultado)){
                                echo"<div class='item'>";
                                echo"<div class='row'>";
                                echo"<div class='col-xs-4 col-xs-offset-2 col-md-6 col-md-offset-3'>";
                                echo"<img src='../../img/Produtos/".$row['img']."' class='thumbnail'  style='width:300px; height:300px; alt='...'>";
                                echo"</div>";
                                echo"</div>";
                                echo"<br>";
                                echo"<div class='carousel-caption'>";
    echo "<div class='container-fluid faixaProduto col-md-10 col-md-offset-2'>".$row['nome_produto']." R$".$row['preco']."</div>";
                                echo"</div>";
                                echo"</div>";
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

                
                <div class="col-md-6 col-md-offset-1 ">
                  
                        <div class="form-inline">
                          <div class="input-group input-group-md col-md-4">
                              <span class="input-group-addon" id="sizing-addon1">Item</span>
                              <input type="text" class="form-control" value="" aria-describedby="sizing-addon1"  name="nome_filme">
                            </div>
                           <div class="input-group col-md-5">
                              <span class="input-group-addon " id="basic-addon1"><span class="glyphicon glyphicon-th"></span></span>
                              <select name="tipo" class="form-control" >
                                  <option value="0"></option> 
                              </select>
                          </div>
                        </div><br>
                        <div class="form-inline">
                          <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span></button>
                            <div class="input-group input-group-md col-md-3 ">
                                <span class="input-group-addon" id="sizing-addon1">Valor</span>
                                <input type="text" class="form-control" value="" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                            </div>
                            <div class="input-group input-group-md col-md-5 ">
                                <span class="input-group-addon" id="sizing-addon1">Quantidade</span>
                                <input type="text" class="form-control" value="" aria-describedby="sizing-addon1"  name="nome_filme">
                            </div><br>
                        </div><br>
                        <div class="form-inline">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                 <button type="button" class="btn btn-default col-md-offset-3">Calcular</button>
                                 <div class="input-group input-group-md col-md-3 ">
                                  <span class="input-group-addon" id="sizing-addon1">Total</span>
                                  <input type="text" class="form-control" value="" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                                </div>
                            </div><br>
                        
                        <div class="formFundo col-md-9">
                        <div class="table-responsive">
                              <table class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Produtor</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Ação</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-minus-sign"></span></button></td>
                                      </tr>
                                      
                                    </tbody>

                              </table> 
                          </div> 
                          <button type="button" class="btn btn-primary">Finalizar</button>
                          <button type="button" class="btn btn-primary">Cancelar</button>
                         </div>

                </div>
              </div>
            </div><br><br> <bR><br><br><br> <bR><br>
          
       

       
          <?php include_once "../modal.php";?>


         <script src="../../Bootstrap/jquery/jquery.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="../../Bootstrap/js/bootstrap.js"></script>
          
    </body>
</html>