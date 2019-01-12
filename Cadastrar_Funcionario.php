<?php
    include_once "php/conexao.php";
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
                            <a href="Home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
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
                            <a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-off"></span> Sair</a>
                        </li>
                    </ul>

            </nav><!--Fim sidebar-->
                  <!-- Page Content Holder -->
            <div id="content" class="col-lg-12">
                <nav class="navbar navbar-default t">
                    <div class="container-fluid">
                         <div class="navbar-header  ">
                             <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn ">
                             <i class="glyphicon glyphicon-align-justify"></i>
                             </button>
                        </div>

                     </div>
                </nav>

                    <div class="row">
                        <div class="col-xs-12  col-sm-11 col-sm-offset-1 col-md-8 col-md-offset-2 color">
                            <div class="container-fluid ner">
                                <center><h1 class="pa">Cadastrar Funcionario</h1></center>
                            </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a>
                            </li>
                            <li role="presentation">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sistema</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                            <br> 
                            <form method="POST" action="php/cadastro.php">    
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Nome Completo</span>
                                    <input type="text" class="form-control" name="nomeCompleto" aria-describedby="basic-addon1">
                                </div>
                            <br>
                            <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Sexo</span>
                                        <select name="sexo" class="form-control">
                                            <option></option> 
                                            <option value="m">Masculino</option>
                                            <option value="f">Feminino</option>
                                       </select>
                            </div>
                            <br>
                            <div class="form-inline">
                                <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">cpf</span>
                                      <input type="text" class="form-control" name ="cpf" maxlength="11" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">telefone</span>
                                      <input type="text" name="tel" class="form-control" onkeypress="return mask(event, this, '(##) ####-####')" maxlength="15" aria-describedby="basic-addon1">
                                </div> 
                            </div>
                            <br>
                                <div class="form-inline">
                                    
                                    <div class="input-group  col-md-7 ">
                                       <span class="input-group-addon" id="basic-addon1">endereço</span>
                                       <input type="text" name="endereco" class="form-control"  aria-describedby="basic-addon1">
                                    </div>
                                    
                                    <div class="input-group col-md-2  ">
                                       <span class="input-group-addon" id="basic-addon1">N°</span>
                                       <input type="text" name="numero" class="form-control"  aria-describedby="basic-addon1">
                                    </div>
                                    <br><br><br>
                                    <br><br><br>
                                </div>

                            </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <br>
                       <form> 
                             <div class="input-group">
                                   <span class="input-group-addon" id="basic-addon1">Usuario</span>
                                   <input type="text" class="form-control" name="usuario" aria-describedby="basic-addon1">
                              </div>
                              <br>
                              <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">Senha</span>
                                    <input type="password" name="senha" class="form-control"  aria-describedby="basic-addon1">
                              </div>
                              <br>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Departamento</span>
                                        <select name="departamento" class="form-control">
                                            <option></option> 
                                            <?php
                                                $sql = "select * from departamento";
                                                $result = mysqli_query($con,$sql);
                                                while($row = mysqli_fetch_assoc($result)){ ?>
                                                    <option value="<?php echo $row['Id_dep'];?>"><?php echo $row['nome_dep'];?></option><?php
                                                }
                                            ?>
                                            
                                       </select>
                                    </div>
                                    <div class="input-group sal">
                                          <span class="input-group-addon" id="basic-addon1">Salario Inicial</span>
                                          <input type="text" name="salario" class="form-control"  aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Tipo de Conta</span>
                                        <select name="tipo" class="form-control">
                                            <option></option> 
                                            <option value="administrador">Administrador</option>
                                            <option value="comun">Comun</option>
                                       </select>
                                </div>
                                <br>
                                <br>
                          
                                <button type="submit" class="btn btn-primary botao">
                                    <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                                </button>
                              </form>
                                <br><br><br>
                        </form>
                    </div>
                                </div> <!-- Fim Tab panes -->
                         </div>
                    </div>
              </div><!--fim Content-->
                    <div class="container-fluid">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Deslogar..</h4>
                                          </div>
                                          <div class="modal-body">
                                                <h3>Você vai querer mesmo sair?</h3>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Sim</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>
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