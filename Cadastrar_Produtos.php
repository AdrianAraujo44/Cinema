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
        <script>
            function aki(){
                var foto=document.getElementById('filme').value;
                var imgg=document.getElementById('imgg');
                alert(foto);
               /*imgg.src="img/PosterFilmes/poster.jpg";*/
                imgg.src=foto;   
            }
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
                            <a href="#" data-toggle="modal" data-target="#sair"><span class="glyphicon glyphicon-off"></span> Sair</a>
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
                        <div class="col-xs-12  col-sm-11 col-sm-offset-1 col-md-8 col-md-offset-2 color">
                            <div class="container-fluid ner">
                                <center><h1 class="pa">Cadastrar Produtos</h1></center>
                            </div>
                            <br>
                            <div class="row">
                                 <div class="col-md-1 col-md-offset-1">
                                   <img src="img/carrinho.png" id="mini_foto_new" style="width:200px;height:225px;"/>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <div class="col-md-7 col-md-offset-3">
                                    <form method="POST" action="php/cadastroProd.php" enctype="multipart/form-data">
                                          <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Nome Produto</span>
                                              <input type="text" name="nomeProd" class="form-control"  aria-describedby="basic-addon1">
                                          </div>
                                      <br>
                                       <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Preço R$</span>
                                              <input type="text" name="preco" class="form-control"  aria-describedby="basic-addon1">
                                       </div>
                                          <br>
                                       <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">Quantidade</span>
                                              <input type="text" name="quantidade" class="form-control"  aria-describedby="basic-addon1">
                                       </div>
                                          <br><br>
                                          <div class="row col-md-12 col-md-offset-5">
                                              <div class="col-md-3">
                                                   <button type="submit" class="btn btn-success botao">
                                                      <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                                                  </button>
                                              </div>
                                              <div class="col-md-5">
                                                      <label for='selecao-arquivo' class="labelUpload"><span class=" glyphicon glyphicon-upload"></span> Upload</label>
                                                     <input type="file" class="fileinput" name="foto" size="60" onchange="readURL(this,'mini_foto_new');" style="cursor:pointer;" id='selecao-arquivo' />
                                              </div>    
                                       </div>
                                    </form>
                                </div>
                                
                           </div>
                        </div>
                </div>
                <?php include_once "modal.php";?>
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