
<!-- Modal Venda de Bilhete-->
<div class="modal fade" id="VendaBilhete<?php echo $row['Id_filme']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Realizando Venda...</h4>
      </div>
      <div class="modal-body">
             <div class="input-group input-group-md">
                  <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-film"></span></span>
                  <input type="text" class="form-control" value="<?php echo $row['nome_filme']?>" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
            </div><br>
            <div class="form-inline">
                  <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                              <th>Sala</th>
                              <th>Horario</th>
                              <th>Formato</th>
                              <th>Preço</th>
                              <th>Ação</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                            </tbody>
                        </table>
                  
            </div><br>
            <div class="form-inline">
                  <div class="input-group col-md-4">
                      <span class="input-group-addon" id="basic-addon1">Inteira</span>
                      <select name="tipo" class="form-control">
                            <option value="0">0</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                      </select>
                  </div>
                  <div class="input-group col-md-4">
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
                  <div class="input-group input-group-md col-md-3">
                        <span class="input-group-addon" id="sizing-addon1">Preço</span>
                        <input type="text" class="form-control" value="30,00" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                  </div><br>
            </div><br>
            <div class="form-inline">
                  <div class="input-group input-group-md col-md-5">
                      <span class="input-group-addon" id="sizing-addon1">Preço Total</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                  </div>
                  <div class="input-group input-group-md col-md-6">
                      <span class="input-group-addon" id="sizing-addon1">Valor Recebido</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme">
                  </div>
            </div><br>
                  <div class="input-group input-group-md col-md-5">
                      <span class="input-group-addon" id="sizing-addon1">Troco</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                  </div><br>               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
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
                                        <a href="../../php/sair.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>sair</button></a>
                                      </div>
                                    </div>
                                </div>
                            </div>
<!--modal de exemplo-->
