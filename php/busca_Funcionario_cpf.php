<link rel="stylesheet" href="MeuStilo/css/estiloPag.css">
<?php
$conecta = mysqli_connect("localhost", "root", "","cinema")or die("Erro ao conectar!");

//fim da conexão com o banco de dados

$cpf = $_POST['cpf'];

$sql = "SELECT * FROM funcionario WHERE cpf LIKE '$cpf%'";
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
                       $query2 = mysqli_query($conecta,$sql2);
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
    <?php }else{?>
    <h4>Nao foram encontrados registros com esta palavra.</h4>
    <?php }?>
