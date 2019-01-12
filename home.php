<?php
    include "php/conexao.php";
    session_start();
    if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"]) ){
        header("Location:login.php");
        exit;
    }
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
		<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <style>
      .gg{
        z-index: -1;
      }
      .foto{
        width: 150px;
        height: 150px;
       border-style: double;
      }
      .botãoicon{
        width: 150px;
      }
  </style>
        <script>
            function readURL(input, id) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#'+id)
          .attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }            
        </script>
    </head>
    <body>    
        
        <div class="wrapper">
                <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <img src="img/adm.jpg" class="logoadm">
                    <br>
                    <br>
                    <center>ADMINISTRADOR</center>
                </div>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="#homeSubmenu"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"> <span class="glyphicon glyphicon glyphicon-film" aria-hidden="true"></span> Filmes</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="Cadastrar_filmes.php"> <span class="glyphicon glyphicon-menu-right"></span> Cadastrar Filmes</a>
                                </li>
                                
                                <li>
                                    <a href="Lista_Filme.php"> <span class="glyphicon glyphicon-menu-right"></span> Lista de Filmes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Funcionarios</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="Cadastrar_Funcionario.php">
                                         <span class="glyphicon glyphicon-menu-right"></span>
                                        Cadastrar Funcionarios
                                    </a>
                                </li>
                                <li>
                                    <a href="ListaFunc.php">
                                         <span class="glyphicon glyphicon-menu-right"></span>
                                        Lista de Funcionario
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#ProduSubmenu" data-toggle="collapse" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Produtos</a>
                            <ul class="collapse list-unstyled" id="ProduSubmenu">
                                <li>
                                    <a href="Cadastrar_Produtos.php">
                                    <span class="glyphicon glyphicon-menu-right"></span> Cadastrar Produtos
                                    </a>
                                </li>
                                <li>
                                    <a href="Lista_Produtos.php">
                                         <span class="glyphicon glyphicon-menu-right"></span> Lista de Produtos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#sair"><span class="glyphicon glyphicon-off"></span> Sair</a>
                        </li>
                    </ul>
            </nav>           
            <div id="content" class="col-lg-12">
                <nav class="navbar navbar-default t">
                    <div class="container-fluid">
                         <div class="navbar-header">
                             <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn ">
                             <i class="glyphicon glyphicon-align-justify"></i>
                             </button>
                        </div>
                     </div>
                </nav>               
                <div class="row">
                        <div class="col-xs-12  col-sm-11 col-sm-offset-1 col-md-10 col-md-offset-1 color">
                            <div class="container-fluid ner">
                                <center><h1 class="pa">HOME</h1></center>
                            </div>
                            <br>
                             <div class="input-group gg ">
                                    <span class="input-group-addon" id="basic-addon1">Senha</span>
                                    <input type="password" name="senha" class="form-control"  aria-describedby="basic-addon1">
                              </div>
                              <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class=" col-md-4 ">
                                            <img src="img/icondepartamento.png" class="foto"><br>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success botãoicon">Departamento</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <span class="caret"></span>
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="#" data-toggle="modal" data-target="#CadastrarDep">Cadastrar departamento</a></li>
                                                  <li><a href="#" data-toggle="modal" data-target="#listaDep">Lista de departamento</a></li>
                                                </ul>
                                          </div>
                                        </div>
                                        <div class=" col-md-4 ">
                                            <img src="img/video.jpg" class="foto"><br>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success botãoicon">Sessão</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <span class="caret"></span>
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="#" data-toggle="modal" data-target="#CadastroSessao">Cadastrar Sessão</a></li>
                                                  <li><a href="#" data-toggle="modal" data-target="#Cadastro_Sala">Cadastrar Salas</a></li>
                                                 
                                                </ul>
                                          </div>
                                        </div>
                                        <div class=" col-md-4 ">
                                            <img src="img/icon.jpg" class="foto"><br>
                                           <div class="btn-group">
                                                <button type="button" class="btn btn-success botãoicon">Genero</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <span class="caret"></span>
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="#" data-toggle="modal" data-target="#CadastrarG">Cadastrar Genero</a></li>
                                                  <li><a href="#" data-toggle="modal" data-target="#listaG">Lista de Genero</a></li>
                                                </ul>
                                          </div>
                                        </div>
                                        <br>
                                        <center><h3>Seja Bem-Vindo ADMINISTRADOR</h3></center>
                                    </div>
                                </div>
                               </div>
                            </div>
                              </div>
                              <?php include_once "modal.php";?>
                
                      </div>
                </div>
        <!--</div>
            </div>   -->
        <!-- jQuery CDN -->
         <script src="Bootstrap/jquery/jquery.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="Bootstrap/js/bootstrap.js"></script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>