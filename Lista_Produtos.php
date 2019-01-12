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
                                <center><h1 class="pa">Lista de Produtos</h1></center>
                            </div>
                            <br>
                            <form class="col-md-5" >
                                 <div class="input-group gg ">
                                        <input type="text" name="senha" placeholder="Pesquisar por Nome" class="form-control"  aria-describedby="basic-addon1" id="palavra">
                                        <span class="input-group-btn">
                                      <button class="btn btn-default" id="buscar" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                                      </span>
                                  </div>
                            </form>
                            <br><br><br>
                              <div class="container-fluid"> 
                                  <div class="row">
                                    <div class="col-md-12">                                     
                                      <?php
                                      $sql = "SELECT * FROM produto";
                                      $query = mysqli_query($con,$sql);
                                      $qtd = mysqli_num_rows($query);
                                      ?>
                                       <table class="table table-striped table-advance table-hover  table-bordered">
        <tbody>
            <tr>
                <th><i class="icon_profile"></i>Código</th>
                <th><i class="icon_profile"></i>Imagem</th>
                <th><i class="icon_profile"></i>Nome</th>
                <th><i class="icon_mail_alt"></i>Preco</th>
                <th><i class="icon_mail_alt"></i>Quantidade</th>
                <th><i class="icon_mail_alt"></i>Ação</th>
            </tr>
            <?php 
            while($linha = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?=$linha['Id_produto'];?></td>
                <td><?php echo '<img src="../../Cine/img/Produtos/' .$linha['img'].'" width="100" height="100" />';?></td>
                <td><?=$linha['nome_produto'];?></td>
                <td>R$ <?=$linha['preco'];?></td>
                <td><?=$linha['quantidade'];?></td>
                <td><button type="button" data-toggle="modal" data-target="#confirmaçãoExcluir<?php echo $linha['Id_produto'];?>" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    <button type="button" data-toggle="modal" data-target="#sair<?php echo $linha['Id_produto']?>" class="btn btn-success" data-dismiss="modal">
                    <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    </td>
            </tr>

            <!--Modal Editar Produto-->
            <div class="modal fade" id="sair<?php echo $linha['Id_produto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Produto</h4>
                        </div>
                        <form action="php/Editar_Produto.php?id=<?php echo $linha['Id_produto'];?>" method="POST">
                        <div class="modal-body">
                            <div class="col-md-1 ">
                                   <img src='img/Produtos/<?php echo $linha['img'];?>' id="mini_foto_new" style="width:200px;height:225px;"/>
                                    <br>
                                    <br>
                            </div>
                                <div class="col-md-7 col-md-offset-4">
                                          <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Nome Produto</span>
                                              <input type="text" name="nomeProd" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['nome_produto'];?>">
                                          </div>
                                      <br>
                                       <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Preço R$</span>
                                              <input type="text" name="preco" class="form-control" value="<?php echo $linha['preco'];?>"  aria-describedby="basic-addon1">
                                          </div><br>
                                        <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Quantidade</span>
                                              <input type="text" name="quantidade" class="form-control"  aria-describedby="basic-addon1" value="<?php echo $linha['quantidade'];?>">
                                       </div>
                                          <br><br>
                                    
                                </div>
                        </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a href="php/Editar_Produto.php"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Salvar</button></a>
                                        <label for='selecao-arquivo' class="labelUpload"><span class=" glyphicon glyphicon-upload"></span> Upload</label>
                                                     <input type="file" class="fileinput" name="foto" size="60" onchange="readURL(this,'mini_foto_new');" style="cursor:pointer;" value="<?php echo $linha['img'];?>" id='selecao-arquivo' />
                                      </div>
                                      </form>
                    </div>
                </div>
            </div>
<div class="modal fade"  id="confirmaçãoExcluir<?php echo $linha['Id_produto'];?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Excluir Produto</h4>
      </div>
      <div class="modal-body">
          <span>Deseja excluir Este Produto?</span><br>
          <span  style="color:red"><?php echo $linha['nome_produto']; ?></span>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <a href ="php/Excluir_Produto.php?deletar=<?php echo $linha['Id_produto']?> "><button type="button" class="btn btn-primary">Confirmar</button></a>
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
         <script>
            function buscar(palavra)
            {
                var page = "php/buscaProduto.php";
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