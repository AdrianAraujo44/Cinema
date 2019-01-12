<?php
 session_start();
    include_once "../../php/conexao.php";
    $radio = $_POST['radio'];

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
            .fundo2{
                background-color: white;
                padding: 12px;
                border: 2px solid black;
                border-radius: 12px;
            }
            #pbotao{
                float :right;
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

          <div class="container-fluid fundo">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['usuario'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#" data-toggle="modal" data-target="#sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                        </ul>
                      </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
             </nav><br><br><br>
             <div class="row ">
                <div class="col-md-10 col-md-offset-2">
                       <div class="container-fluid">
                        <div class="col-md-2 col-md-offset-1 ">
                        <img src='../../img/filmes/poster.jpg' class='thumbnail'  style='width:210px; height:300px'><br>
                       </div>
                       <div class="col-md-5 col-md-offset-1  fundo2">
                        <?php
                          $sql="select  f.nome_filme from sessao as s  inner join filme as f on s.id_sessao = f.id_filme where s.id_sessao='$radio'";
                          echo $sql;
                          $result =  mysqli_query($con,$sql);
                          while($ln = mysqli_fetch_assoc($result)){
                            echo'<div class="input-group input-group-md">';
                              echo'<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-film"></span></span>';
                              echo'<input type="text" class="form-control" value="'.$ln['nome_filme'].'" ;aria-describedby="sizing-addon1"  name="filme" disabled="disabled" value="">';
                       echo' </div><br>';
                         }?>
                          
                        
            <div class="form-inline">
                  <div class="input-group col-md-6">
                      <span class="input-group-addon" id="basic-addon1">Inteira</span>
                      <select name="tipo" class="form-control" onchange='CalcularPreco()'>
                            <option value="0">0</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                      </select>
                  </div>
                  <div class="input-group col-md-5">
                      <span class="input-group-addon" id="basic-addon1">Meia</span>
                      <select name="tipo" class="form-control">
                          <option value="0">0</option> 
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                  </div>
                  
            </div><br>
            <div class="form-inline">
                  <div class="input-group input-group-md col-md-6">
                      <span class="input-group-addon" id="sizing-addon1">Preço Total</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                  </div>
                  <div class="input-group input-group-md col-md-5">
                      <span class="input-group-addon" id="sizing-addon1">Valor Recebido</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme">
                  </div>
            </div><br>
            <div class="input-group input-group-md col-md-6">
                  <span class="input-group-addon" id="sizing-addon1">Troco</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
            </div><br>               
            <p id="pbotao"><button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
            <a href="Home.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a></p>
                            
                      </div> 

                   
                   </div>
                   </div>
             </div>
             <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
           </div>
           <?php include_once "../modal.php";?>
           <script src="../../Bootstrap/jquery/jquery.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="../../Bootstrap/js/bootstrap.js"></script>
         </body>
         </html>