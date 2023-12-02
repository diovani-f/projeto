<h1>Cadastrar nova propriedade!</h1>

<form action="?page=propriedade-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
        <label>Veiculo/Placa</label>
        <select name="veiculo_idVeiculo" id="veiculo_idVeiculo" class="form-control">
            <?php 
                $sql = "SELECT * FROM veiculo 
                INNER JOIN modelo on veiculo.modelo_idModelo = modelo.idModelo
                INNER JOIN marca ON modelo.marca_idMarca = marca.idMarca;
                ";

                // Aqui nao deixa o usuario ter propriedade de um carro que ja tem propriedade
                // $sql = "SELECT *
                // FROM veiculo v
                // INNER JOIN modelo m ON v.modelo_idModelo = m.idModelo
                // INNER JOIN marca ma ON m.marca_idMarca = ma.idMarca
                // WHERE NOT EXISTS (
                //     SELECT 1
                //     FROM propriedade p
                //     WHERE p.veiculo_idveiculo = v.idVeiculo
                // );";


                $res = $conn->query($sql);

                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        print "<option value='".$row->idVeiculo."'>".$row->nomeMarca." - ".$row->placa."</option>";
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
                $sql_p = "SELECT * FROM pessoa";
                $res_p = $conn->query($sql_p);

                if($res_p->num_rows > 0){
                    while($row_p = $res_p->fetch_object()){
                        print "<option value='".$row_p->idPessoa."'>".$row_p->nomePessoa." - ".$row_p->cpf."</option>";
                    }
                }
                else{
                    print "<option>Não há pessoas cadastradas</option>";
                }
            ?>


        </select>
    </div> 

    <div class="mb-3">
        <label>Data da compra</label><br>
        <input type="date" id="dataCompra" name="dataCompra" required>
    </div>

    <div class="mb-3">
        <label>Data da venda(se houver)</label><br>
        <input type="date" id="dataVenda" name="dataVenda">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar Veiculo</button>
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