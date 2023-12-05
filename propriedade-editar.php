<h1>Editar Propriedade!</h1>
<?php
    $sql_1 = "SELECT * FROM propriedade
    INNER JOIN veiculo on propriedade.veiculo_idVeiculo = veiculo.idVeiculo
    WHERE idPropriedade=".$_REQUEST['idPropriedade'];
    $res_1 = $conn->query($sql_1);
    $row_1 = $res_1->fetch_object();
    $idPropriedade = $_REQUEST['idPropriedade'];
?>
<form action="?page=propriedade-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idPropriedade" value="<?php print $idPropriedade;?>">
  <div class="mb-3">
        <label>Veiculo</label>
        <select name="veiculo_idVeiculo" id="veiculo_idVeiculo" class="form-control">
            <?php 
                 $sql = "SELECT veiculo.idVeiculo, veiculo.placa, veiculo.anoFabricacao, modelo.nomeModelo, marca.nomeMarca, categoria.nomeCategoria
                 FROM veiculo
                 JOIN modelo ON veiculo.modelo_idModelo = modelo.idModelo
                 JOIN marca ON modelo.marca_idMarca = marca.idMarca
                 JOIN categoria ON veiculo.categoria_idCategoria = categoria.idCategoria
                 LEFT JOIN propriedade ON veiculo.idVeiculo = propriedade.veiculo_idVeiculo
                 WHERE propriedade.dataVenda <> '0000-00-00' OR propriedade.idPropriedade IS NULL;  ";
                $res = $conn->query($sql);

                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        if($row_1->veiculo_idVeiculo == $row->idVeiculo){
                            print "<option value='".$row->idVeiculo."'>".$row->nomeMarca." - ".$row->placa."</option>";
                        }else{
                            print "<option value='".$row->idVeiculo."'>".$row->nomeMarca." - ".$row->placa."</option>";
                        }
                    }
                }
                else{
                    print "<option>Não há modelos cadastrados</option>";
                }
            ?>
        </select>
            </div>

    <div class="mb-3">
            <label>Dono/Cpf</label>
            <select name="pessoa_idPessoa" id="pessoa_idPessoa" class="form-control">
                <?php 
                    $sql_2 = "SELECT * FROM pessoa";
                    $res_2 = $conn->query($sql_2);

                    if($res_2->num_rows > 0){
                        while($row_2 = $res_2->fetch_object()){
                            if($row_1->pessoa_idPessoa == $row_2->idPessoa){
                                print "<option value='".$row_2->idPessoa."' selected>".$row_2->nomePessoa." - ".$row_2->cpf."</option>";
                            }else{
                                print "<option value='".$row_2->idPessoa."'>".$row_2->nomePessoa." - ".$row_2->cpf."</option>";
                            }
                        }
                    }
                    else{
                        print "<option>Não há pessoas cadastradas</option>";
                    }
                ?>
            </select>
        </div>  


    <div class="mb-3">
        <label>Data de Compra</label>
        <input type="date" name="dataCompra" id="dataCompra" class="form-control" value="<?php print $row_1->dataCompra;?>">
    </div>
    <div class="mb-3">
        <label>Data de Venda</label>
        <input type="date" name="dataVenda" class="form-control" value="<?php print $row_1->dataVenda;?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Editar Modelo</button>
    </div>
</form>

<script>
  function validarFormulario() {
    var veiculo_idVeiculo = document.getElementById('veiculo_idVeiculo').value.trim();
    var pessoa_idPessoa = document.getElementById('pessoa_idPessoa').value.trim();
    var dataCompra = document.getElementById('dataCompra').value.trim();


    if (veiculo_idVeiculo === '' ||pessoa_idPessoa === '' ||dataCompra === '') {
      alert('Por favor, preencha todos os campos.');
      return false; // Impede o envio do formulário se o campo estiver vazio
    }

    return true;
  }
</script>