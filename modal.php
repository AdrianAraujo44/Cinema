<!--Modal de Cadastro de Sessao-->
                              <div class="modal fade" id="CadastroSessao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Cadastro Sessão</h4>
                                      </div>
                                      <form action="php/Cadastro_Sessao.php" method="post">
                                      <div class="modal-body">

                                        <a class="btn btn-success   col-md-offset-11" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        </a><br>
                                      <div class="collapse" id="collapseExample">
                                        <div class="well">
                                          <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">Filme</span>
                                                <select name="Nome_Filme" class="form-control">
                                                    <option></option> 
                                                    <?php
                                                      $sql = "select * from filme";
                                                      $result = mysqli_query($con,$sql);
                                                      while($row = mysqli_fetch_assoc($result)){ ?>
                                                          <option value="<?php echo $row['Id_filme'];?>"><?php echo $row['nome_filme'];?></option><?php
                                                      }
                                                  ?>
                                                </select>
                                            </div><br>
                                            <div class="form-inline">
                                              <div class="input-group col-md-3">
                                                <span class="input-group-addon" id="basic-addon1">Sala</span>
                                                <select name="Sala" class="form-control">
                                                    <option></option>
                                                    <?php
                                                      $sql = "select * from sala";
                                                      $result = mysqli_query($con,$sql);
                                                      while($row = mysqli_fetch_assoc($result)){ ?>
                                                          <option value="<?php echo $row['id_sala'];?>"><?php echo $row['nome_sala'];?></option><?php
                                                      }
                                                  ?>
                                                </select>
                                              </div>
                                              <div class="input-group col-md-3">
                                                    <span class="input-group-addon" id="basic-addon1">Hora</span>
                                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="Hora">
                                              </div>
                                              <div class="input-group col-md-2">
                                                <select name="Formato" class="form-control">
                                                    <option value="1">2d</option>
                                                    <option value="2">3d</option>
                                                </select>
                                              </div>
                                            <div class="input-group col-md-3">
                                                    <span class="input-group-addon" id="basic-addon1">Preço</span>
                                                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="preco">
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                       <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                              <th>Filme</th>
                              <th>Sala</th>
                              <th>Horario</th>
                              <th>Formato</th>
                              <th>Preço</th>

                              </tr>
                            </thead>
                            <tbody>
                               <?php  $sql="select sa.nome_sala, s.preco , s.horario , df.dimensao, f.nome_filme from filme as f inner JOIN sessao as s on s.nome_filme = f.id_filme inner join sala as sa on sa.id_sala=s.sala inner join d_filme as df on df.id_dfilme = s.dimensao"; 
                                $result =  mysqli_query($con,$sql);
                                while($ln = mysqli_fetch_assoc($result)){                             
                                echo'<tr>';
                                echo"<td>".$ln['nome_filme']."</td>";
                                echo"<td>".$ln['nome_sala']."</td>";
                                echo"<td>".$ln['horario']."</td>";
                                echo"<td>".$ln['dimensao']."</td>";
                                echo"<td>".$ln['preco']."</td>";
                                echo'</tr>';
                              }?>
                            </tbody>

                        </table>
                                            
                                            
                                        
                                      </div><br>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                      </form>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        <!--modal de cadastrar sala-->
                        <div class="modal fade" id="Cadastro_Sala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Cadastro de Salas</h4>
                                      </div>
                                      <form action="php/Cadastro_Salas.php" method="post">
                                        <div class="modal-body">
                                               <div class="input-group ">
                                                      <span class="input-group-addon" id="basic-addon1">Sala</span>
                                                      <input type="text" class="form-control" aria-describedby="basic-addon1" name="sala">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                          <button type="submit" class="btn btn-primary">Salvar</button></a>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        <!--modal de sair do sistema-->
                        <div class="modal fade" id="sair" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Saindo do Sistema</h4>
                                      </div>
                                      <div class="modal-body">
                                            <h3>Deseja sair do Sistema?</h3>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a href="php/sair.php"><button type="button" class="btn btn-primary">sair</button></a>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        <!--modal de lista de funcionario-->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lista de Funcionarios</h4>
                                      </div>
                                      <div class="modal-body">
                                          <?php
                                            $sql ="select * from funcionario";
                                            $result = mysqli_query($con,$sql);
                                          ?>
                                            <div class="table-responsive">
                                                    <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>CPF</th>
                                                          <th>Nome</th>
                                                          <th>Sexo</th>
                                                          <th>Endereco</th>
                                                          <th>Telefone</th>
                                                          <th>N°</th>
                                                          <th>Ação</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                                while($row = mysqli_fetch_assoc($result)){
                                                          ?>
                                                        <tr>
                                                          <td><?php echo $row['cpf'];?></td>
                                                          <td><?php echo $row['nome_func'];?></td>
                                                          <td><?php echo $row['sexo'];?></td>
                                                          <td><?php echo $row['endereco'];?></td>
                                                          <td><?php echo $row['telefone'];?></td>
                                                          <td><?php echo $row['numero'];?></td>
                                                          <td>
                                                              <a href="php/ExcluirFunc.php?deletar=<?php echo $row['cpf'];?>">
                                                                  <button type="button" class="btn btn-danger">
                                                                      <span class="glyphicon glyphicon-trash"></span>
                                                                  </button> 
                                                              </a>
                                                                   <button type="button" data-toggle="modal" data-target="#editarCliente" class="btn btn-success" data-dismiss="modal">
                                                                  <span class="glyphicon glyphicon-pencil"></span>
                                                                  </button>
                                                              
                                                            </td>
                                                        </tr>
                                                          <?php } ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                        
                                      </div>
                            </div>
                          </div>
                        </div>
                         
                            
                        <!--modal de Cadastrar departamento-->
                        <div class="modal fade" id="CadastrarDep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Cadastrar Departamento</h4>
                                      </div>
                                        <form action="php/cadastroDep.php" method="post">
                                          <div class="modal-body">

                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1">
                                                      <span class="glyphicon glyphicon-th"></span>
                                                    </span>
                                                  <input type="text" class="form-control" placeholder="Departamento" aria-describedby="basic-addon1" name="departamento">
                                                </div>

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                                            </button>
                                          </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            <!--modal de lista de Departamento-->
                        <div class="modal fade" id="listaDep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lista de Departamento</h4>
                                      </div>
                                      <div class="modal-body">
                                            <?php
                                            $sql ="select * from departamento";
                                            $result = mysqli_query($con,$sql);
                                          ?>
                                            <div class="table-responsive">
                                                    <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>Departamento</th>
                                                          <th>Ação</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                                while($row = mysqli_fetch_assoc($result)){
                                                          ?>
                                                        <tr>
                                                          <td><?php echo $row['nome_dep'];?></td>
                                                          <td>
                                                              <a href="php/Excluir.php?deletar=<?php echo $row['Id_dep'];?>">
                                                                  <button type="button" class="btn btn-danger ">
                                                                      <span class="glyphicon glyphicon-trash">
                                                                        </span>
                                                                  </button>
                                                               </a>   
                                                              <a href="" data-toggle="modal" data-target="#Editar_Departamento<?php echo $row['nome_dep'];?>"><button type="button" class="btn btn-success" >
                                                                  <span class="glyphicon glyphicon-pencil"></span>
                                                            </button>
                                                              </a>
                                                              <div class="modal fade" id="Editar_Departamento<?php echo $row['nome_dep'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Editar Departamento</h4>
                                            </div>
                                            <form action="php/Editar_Departamento.php?id_dep=<?php echo $row['Id_dep']?>" method="post">
                                                <div class="modal-body">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                        </span>
                                                        <input type="text" class="form-control" placeholder="Departamento" aria-describedby="basic-addon1" name="departamento" value="<?php echo $row['nome_dep']?>">
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
                                                        </td>
                                                        </tr>
                                                          <?php } ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                           Cancelar
                                        </button>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal editar Departamento-->
                            
                            <!--modal de Cadastrar Categoria-->
                        <div class="modal fade" id="CadastrarG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Cadastrar Genero</h4>
                                      </div>
                                        <form action="php/cadastroG.php" method="post">
                                          <div class="modal-body">

                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1">
                                                      <span class="glyphicon glyphicon-th"></span>
                                                    </span>
                                                  <input type="text" class="form-control" placeholder="Genero" aria-describedby="basic-addon1" name="genero">
                                                </div>

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                                            </button>
                                          </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            <!--modal de lista de Genero-->
                        <div class="modal fade" id="listaG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Lista de Genero</h4>
                                      </div>
                                      <div class="modal-body">
                                            <?php
                                            $sql ="select * from genero";
                                            $result = mysqli_query($con,$sql);
                                          ?>
                                            <div class="table-responsive">
                                                    <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>Genero</th>
                                                          <th>Ação</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                                while($row = mysqli_fetch_assoc($result)){
                                                          ?>
                                                        <tr>
                                                          <td><?php echo $row['nome_genero'];?></td>
                                                          <td><a href="php/Excluir_Genero.php?deletar=<?php echo $row['Id_genero']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a> 
                                                            <a href="" data-toggle="modal" data-target="#Editar_Genero<?php echo $row['Id_genero'];?>"><button type="button" class="btn btn-success" >
                                                                  <span class="glyphicon glyphicon-pencil"></span>
                                                            </button>
                                                              </a>
                                                              <div class="modal fade" id="Editar_Genero<?php echo $row['Id_genero'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Editar Genero</h4>
                                            </div>
                                            <form action="php/Editar_Genero.php?id=<?php echo $row['Id_genero']?>" method="post">
                                                <div class="modal-body">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                        </span>
                                                        <input type="text" class="form-control" placeholder="Departamento" aria-describedby="basic-addon1" name="genero" value="<?php echo $row['nome_genero']?>">
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
                                                          </td>
                                                        </tr>
                                                          <?php } ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                              
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                           Cancelar
                                        </button>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            