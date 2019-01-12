
<script>
function CalcularPreco(){
               var valor_radio     =document.getElementById('radio').value;
               var tipoInteira     =document.getElementById('tipoInteira').value;
               var tipoMeia        =document.getElementById('tipoMeia').value;
               var Meia = (valor_radio / 2)* tipoMeia;
               var preco = (valor_radio * tipoInteira)+ Meia;
               document.getElementById('precoTotal').value = preco;
               alert("ok");
            }
            function PrecoFinal(){
               var valor_radio     =document.getElementById('radio').value;
               var ValorRecebido   =document.getElementById('ValorRecebido').value;
               var precoTotal   =document.getElementById('precoTotal').value;
               
                document.getElementById('troco').value=ValorRecebido - precoTotal;
                
            }

</script>
<header>       
            <div class="form-inline">
                  <div class="input-group col-md-6">
                      <span class="input-group-addon" id="basic-addon1">Inteira</span>
                      <select name="tipo" class="form-control" id="tipoInteira" onchange="CalcularPreco()">
                            <option value="0">0</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                      </select>
                  </div>
                  <div class="input-group col-md-5">
                      <span class="input-group-addon" id="basic-addon1">Meia</span>
                      <select name="tipo" class="form-control" id="tipoMeia" onchange="CalcularPreco()">
                          <option value="0">0</option> 
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                  </div>
                  
            </div><br>
            <div class="form-inline">
                  <div class="input-group input-group-md col-md-6">
                      <span class="input-group-addon" id="sizing-addon1">Preço Total</span>
                      <input type="text" class="form-control" id="precoTotal" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
                  </div>
                  <div class="input-group input-group-md col-md-5">
                      <span class="input-group-addon" id="sizing-addon1">Valor Recebido</span>
                      <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme">
                  </div>
            </div><br>
            <div class="input-group input-group-md col-md-6">
                  <span class="input-group-addon" id="sizing-addon1">Troco</span>
                  <input type="text" class="form-control" aria-describedby="sizing-addon1"  name="nome_filme" disabled="disabled">
            </div><br>               
            <p id="pbotao"><button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
            <a href="Home.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a></p>
                            
                      </div>
</header>