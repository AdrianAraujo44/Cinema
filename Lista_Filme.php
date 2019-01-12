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
        <link rel="stylesheet" href="MeuStilo/js/MeuJquery.js">
        <script src="MeuStilo/js/MeuJs.js"></script>
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
                            <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"> <span class="glyphicon glyphicon glyphicon-film" aria-hidden="true"></span> Filmes</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="Cadastrar_filmes.php"> <span class="glyphicon glyphicon-menu-right"></span> Cadastrar Filmes</a>
                                </li>
                                
                                <li>
                                    <a href="lista_Filme.php"> <span class="glyphicon glyphicon-menu-right"></span> Lista de Filmes</a>
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
                            <div class="container-fluid ner">
                                <center><h1 class="pa">Lista de Filmes</h1></center>
                            </div>
                            <br>
                            <form class="col-md-5" method="post" action="">
                                 <div class="input-group gg ">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                        <input type="text" name="pesquisaNome" id="pesquisaNome" placeholder="Pesquisar por Nome" class="form-control"  aria-describedby="basic-addon1">
                                  </div>
                            </form>
                                <div class=" col-md-offset-7">
                                  
                                </div>
                            <br><br><br>
                              <div class="container-fluid "> 
                                  <div class="row">
                                    <div class="col-md-12">                                     
                                       <?php
                                          $loop = 3;
                                       $select = "select * from filme";
                                       $qr = mysqli_query($con,$select);
                                       $i = 1;
                                       $caminho = "img/filmes";    
                                       ?> 
                                       <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th>Imagem</th>
                                                          <th>Nome</th>
                                                          <th>Ação</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                           While($ln = mysqli_fetch_array($qr)){
                                                        ?>
                                                        <tr>
                                                          <td><?php echo '<img src="img/filmes/' .$ln['img'].'" width="100" height="150" />';?></td>
                                                          <td><h5><?php echo $ln['nome_filme'];?></h5></td>
                                                          <td>
                                                              
                                                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmaçãoExcluir<?php echo $ln['Id_filme'];?>">
                                                                      <span class="glyphicon glyphicon-trash"></span>
                                                                  </button> 
                                                              
                                                               <button type="button" data-toggle="modal" data-target="#EditarFilme<?php echo $ln['Id_filme'];?>" class="btn btn-success" data-dismiss="modal">
                                                                  <span class="glyphicon glyphicon-pencil"></span>
                                                               </button>
                                                            </td>
                                                        </tr>
<!--Modal Confirmação de Excluir filme-->
<div class="modal fade"  id="confirmaçãoExcluir<?php echo $ln['Id_filme'];?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Excluir Filme</h4>
      </div>
      <div class="modal-body">
          <span>Deseja excluir Este Filme?</span><br>
          <span  style="color:red"><?php echo $ln['nome_filme']; ?></span>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <a href ="php/Excluir_filme.php?deletar=<?php echo $ln['Id_filme'];?>"><button type="button" class="btn btn-primary">Confirmar</button></a>
      </div>
    </div>
  </div>
</div>
<!--editar Filme-->
<div class="modal fade " id="EditarFilme<?php echo $ln['Id_filme'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar Filme</h4>
                                      </div>
                                       <form method="POST" action="php/Editar_Filme.php?editar=<?php echo $ln['Id_filme']?>"  enctype="multipart/form-data">
                                      <div class="modal-body">
                                          <div class="row">
                                  <div class="col-md-1">
                                   <img src="img/filmes/<?php echo $ln['img']?>" id="mini_foto_new<?php echo $ln['Id_filme'];?>" style="width:290px;height:350px;float:left;"/>                                    
                                  </div>
                                <div class="col-md-8 col-md-offset-3">
                                  
                                          <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Nome do Filme</span>
                                              <input type="text" class="form-control" value="<?php echo $ln['nome_filme']?>"  name="nomeF" aria-describedby="basic-addon1">
                                          </div>
                                          <br>
                                          <div class="form-inline">
                                              <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Lançamento</span>
                                                    <input type="date" class="form-control" name="ano" maxlength="15" aria-describedby="basic-addon1" value="<?php echo $ln['dt_lancamento']?>">
                                              </div>

                                              <div class="input-group col-md-5">
                                                    <span class="input-group-addon" id="basic-addon1">Duração</span>
                                                    <input type="text" class="form-control" name="duracao" maxlength="15" aria-describedby="basic-addon1" value="<?php echo $ln['duracao']?>">
                                              </div>
                                          </div>
                                          <br>
                                           <div class="input-group">
                                                      <span class="input-group-addon" id="basic-addon1">Classificação</span>
                                                      <select class="form-control" name="class">
                                                            <?php
                                                              $sql="select  cl.class , cl.Id_class from classificacao as cl 
                                                                    inner join filme as f 
                                                                    on cl.Id_class = f.class
                                                                    where f.Id_filme=".$ln['Id_filme']."
                                                                    ";
                                                              $result = mysqli_query($con,$sql);
                                                              while($row = mysqli_fetch_assoc($result)){
                                                   echo"<option style='background-color:DimGray; color:white' value=".$row['Id_class'].">".$row["class"]."</option>";
                                                              }
                                                            ?>
                                                             
                                                           <?php
                                                              $sql = "select * from classificacao";
                                                              $result = mysqli_query($con,$sql);
                                                              while($row = mysqli_fetch_assoc($result)){ ?>
                                                                  <option value="<?php echo $row['Id_class'];?>"><?php echo $row['class'];?></option><?php
                                                              }
                                                            ?>    
                                                     </select>
                                           </div> <br> 
                                           <div class="input-group">
                                                 <span class="input-group-addon" id="basic-addon1">Genero</span>
                                                 <select class="form-control" name="genero">
                                                  <?php
                                                      $sql="select  g.nome_genero , g.Id_genero from genero as g 
                                                            inner join filme as f 
                                                            on g.Id_genero = f.genero
                                                            where f.Id_filme=".$ln['Id_filme']."
                                                            ";
                                                      $result = mysqli_query($con,$sql);
                                                      while($row = mysqli_fetch_assoc($result)){
                                                   echo"<option style='background-color:DimGray; color:white' value=".$row['Id_genero'].">".$row["nome_genero"]."</option>";
                                                              }
                                                            ?>  
                                                  <?php
                                                    $sql = "select * from genero";
                                                    $result = mysqli_query($con,$sql);
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                                        <option value="<?php echo $row['Id_genero'];?>"><?php echo $row['nome_genero'];?></option><?php
                                                    }
                                                  ?>                                          
                                                 </select>
                                            </div>
                                                  <br>
                                                  <br>
                                </div>
                            </div>
                            <br>
                        </div>
                                      <div class="modal-footer">
                                         <button type="submit" class="btn btn-primary botao col-md-offset-1">
                                            <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                                         </button>
                                          <label for='selecao-arquivo' class="labelUpload"><span class=" glyphicon glyphicon-upload"></span> Upload</label>
                                          <input type="file" class="fileinput" name="foto" size="60" onchange="readURL(this,'mini_foto_new<?php echo $ln['Id_filme'];?>');" style="cursor:pointer;" value="<?php echo $ln['img']?>" id='selecao-arquivo'  />
                                      </div>
                                      </form> 
                            </div>
                          </div>
                        </div>
                                                          <?php } ?>
                                                      </tbody>
                                                    </table>
                                                  </div>                                         
                                    </div>
                                </div>
                               </div>
                               <ul class="resultado"></ul>
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