
<?php
$conecta = mysqli_connect("localhost", "root", "","cinema")or die("Erro ao conectar!");

//fim da conexão com o banco de dados

$palavra = $_POST['palavra'];

$sql = "SELECT * FROM produto WHERE nome_produto LIKE '$palavra%'";
$query = mysqli_query($conecta,$sql);
$qtd = mysqli_num_rows($query);
?>


    <header class="panel-heading">
        Dados da busca:
    </header>
    <?php
    if($qtd>0){
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
            <div class="modal fade" id="sair<?php echo $linha['Id_produto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Produto</h4>
                        </div>
                        <form action="php/Editar_Funcionario.php" method="POST">
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
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> sair</button>
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
    <?php }else{?>
    <h4>Nao foram encontrados registros com esta palavra.</h4>
    <?php }?>
