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
     /* .gg{
        z-index: -1;
      }*/
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
    <body onload="buscar('')">    
        
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
                            <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
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
                                    <a href="ListaFunc.php" >
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
                          <?php
                          $sql = "SELECT * FROM funcionario";
                          $query = mysqli_query($con,$sql);
                          $qtd = mysqli_num_rows($query);
                          ?>
                            <div class="container-fluid ner">
                                <center><h1 class="pa">Lista de Funcionario</h1></center>
                            </div>
                            <br>
                            <form class="col-md-5">
                                 <div class="input-group gg ">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                        <input type="text" name="senha" placeholder="Pesquisar por Nome" class="form-control"  aria-describedby="basic-addon1">
                                  </div>
                            </form>
                                <div class=" col-md-offset-7">
                                  <div class="input-group gg ">
                                        <input type="text" name="senha" placeholder="Pesquisar por CPF" class="form-control"  aria-describedby="basic-addon1" id="cpf">
                                        <span class="input-group-btn">
                                      <button class="btn btn-default" id="buscar" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                                  </span>
                                  </div>
                                </div>
                                <br><Br>
                              <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-advance table-hover  table-bordered">
        <tbody>
            <tr>
                <th><i class="icon_profile"></i>CPF</th>
                <th><i class="icon_profile"></i>Nome</th>
                <th><i class="icon_profile"></i>Departamento</th>
                <th><i class="icon_profile">Endereço</i></th>
                <th><i class="icon_mail_alt"></i>Telefone</th>
                <th><i class="icon_mail_alt"></i>Ação</th>

            </tr>
            <?php 
            while($linha = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?=$linha['cpf'];?></td>
                <td><?=$linha['nome_func'];?></td>
                    <?php $ndep = $linha['departamento'] ;
                       $sql2="select nome_dep from departamento where Id_dep = $ndep";
                       $query2 = mysqli_query($con,$sql2);
                        while($linha2 = mysqli_fetch_assoc($query2)){
                            echo'<td>'.$linha2["nome_dep"].'</td>';
                        }
                    ?>
                <td><?=$linha['endereco'];?></td>
                <td><?=$linha['telefone'];?></td>
                <td><button type="button" data-toggle="modal" data-target="#confirmaçãoExcluir<?php echo $linha['cpf'];?>" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    <button type="button" data-toggle="modal" data-target="#editarFunc<?php echo $linha['cpf'];?>" class="btn btn-success" data-dismiss="modal">
                    <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    </td>  
            </tr>
            <!--modal de Editar Funcionario-->
 <div class="modal fade " id="editarFunc<?php echo  $linha['cpf'];?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Funcionario</h4>
                                      </div>
                                      <form method="POST" action="php/Editar_Funcionario.php?editar=<?php echo $linha['cpf']?>">
                             <div class="modal-body">
                                  <div>
                                          <!-- Nav tabs -->
                                  <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#home<?php echo $linha['cpf'];?>" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a></li>
                                      <li role="presentation"><a href="#settings<?php echo $linha['cpf'];?>" aria-controls="settings" role="tab" data-toggle="tab">Dados do Sistema</a></li>
                                   </ul>

                                              <!-- Tab panes -->
                                   <div class="tab-content">
                                      
                                       <div role="tabpanel" class="tab-pane active" id="home<?php echo $linha['cpf'];?>">
                                            <br>
                                              <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1">Nome Completo</span>
                                                  <input type="text" class="form-control" name="nomeCompleto" aria-describedby="basic-addon1" value="<?php echo $linha['nome_func'];?>">
                                               </div>
                                               <br>
                                               <div class="form-inline">
                                                <div class="input-group">
                                                      <span class="input-group-addon" id="basic-addon1">cpf</span>
                                                      <input type="text" class="form-control" name ="cpf"maxlength="15" aria-describedby="basic-addon1" value="<?php echo $linha['cpf'];?>">
                                                </div>
                                                 <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Sexo</span>
                                                    <select name="sexo" class="form-control">
                                                        <?php
                                                          if($linha['sexo']=="m"){ 
                                                           echo'<option value="m">Masculino</option>';
                                                           echo'<option value="f">Feminino</option>';
                                                          }else{
                                                            echo'<option value="f">Feminino</option>';
                                                            echo'<option value="m">Masculino</option>';
                                                          }
                                                        ?>
                                                   </select>
                                                </div>  
                                            </div><br>
                                            <div class="input-group col-md-5">
                                                      <span class="input-group-addon" id="basic-addon1">telefone</span>
                                                      <input type="text" name="tel" class="form-control" onkeypress="return mask(event, this, '(##) ####-####')" maxlength="15" aria-describedby="basic-addon1" value="<?php echo $linha['telefone'];?>">
                                                </div>
                                            <br>
                                             <div class="form-inline">
                                                <div class="input-group  col-md-7 ">
                                                   <span class="input-group-addon" id="basic-addon1">endereço</span>
                                                   <input type="text" name="endereco" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['endereco'];?>">
                                                </div>

                                                <div class="input-group col-md-2  ">
                                                   <span class="input-group-addon" id="basic-addon1">N°</span>
                                                   <input type="text" name="numero" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['numero'];?>">
                                                </div>
                                            </div>  
                                             
                                        </div>
                                                <div role="tabpanel" class="tab-pane" id="settings<?php echo $linha['cpf'];?>"><br>
                                                    <div class="input-group">
                                                       <span class="input-group-addon" id="basic-addon1">Usuario</span>
                                                       <input type="text" class="form-control" name="usuario" aria-describedby="basic-addon1" value="<?php echo $linha['usuario'];?>">
                                                    </div>
                                                  <br>
                                                  <div class="input-group ">
                                                        <span class="input-group-addon" id="basic-addon1">Senha</span>
                                                        <input type="password" name="senha" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['senha'];?>">
                                                  </div>
                                                  <br>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">Tipo de Conta</span>
                                                            <select name="tipo" class="form-control">
                                                              <?php
                                                                if($linha['tipo']=="comun"){
                                                                  echo'<option value="comun">Comun</option>';
                                                                  echo'<option value="administrador">Administrador</option>';
                                                                }else{
                                                                   echo'<option value="administrador">Administrador</option>';
                                                                    echo'<option value="comun">Comun</option>';
                                                                }
                                                              ?>
                                                           </select>
                                                        </div>
                                                    <div class="input-group col-md-5">
                                                          <span class="input-group-addon" id="basic-addon1">Salario Inicial</span>
                                                          <input type="text" name="salario" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['salario'];?>">
                                                    </div>
                                                    
                                                    </div><br>
                                                    <!--<div class="input-group col-md-6">
                                                            <span class="input-group-addon" id="basic-addon1">Departamento</span>
                                                            <select name="tipo" class="form-control">
                                                              /*
                                                                $sql2="select * from departamento";
                                                                $resultt = mysqli_query($con,$sql2);
                                                                while($row2 = mysqli_fetch_assoc($resultt)){
                                                                    echo"<option value='comun'>".$row2['nome_dep']."</option>";
                                                                    /*cria um sql3 com inner join comparando com o resultado do sql2 */
                                                                }
                                                              
                                                           </select>
                                                        </div>-->
                                                </div>
                                           
                                    </div>
                                    </div>
                                 </div> 
                                
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                      </div>
                                  </form>
                                    </div>
                                </div>
                            </div>

<!--Confirmação de Excluir Funcionario-->
<div class="modal fade"  id="confirmaçãoExcluir<?php echo $linha['cpf'];?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Excluir Funcionario</h4>
      </div>
      <div class="modal-body">
          <span style="color:red">Deseja excluir Este Funcionario?</span>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <a href ="php/ExcluirFunc.php?deletar=<?php echo $linha['cpf']?> "><button type="button" class="btn btn-primary">Confirmar</button></a>
      </div>
    </div>
  </div>
</div>
            

            <?php }?>
            
        </tbody>
    </table>             
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
         <!--<script>
            function buscar(cpf)
            {
                var page = "php/busca_funcionario_cpf.php";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#dados").html("Carregando...");
                            },
                            data: {cpf: cpf},
                            success: function (msg)
                            {
                                $("#dados").html(msg);
                            }
                        });
            }
            
            
            $('#buscar').click(function () {
                buscar($("#cpf").val())
            });
        </script>-->
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