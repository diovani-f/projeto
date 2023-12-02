<h1>Cadastrar novo Veiculo!</h1>

<form action="?page=veiculo-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_idModelo" id="modelo_idModelo" class="form-control">
            <?php 
                $sql = "SELECT * FROM modelo INNER JOIN marca on modelo.marca_idMarca = marca.idMarca";
                $res = $conn->query($sql);

                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        print "<option value='".$row->idModelo."'>".$row->nomeMarca." - ".$row->nomeModelo."</option>";
                    }
                }
                else{
                    print "<option>Não há modelos cadastrados</option>";
                }

            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_idCategoria" id="categoria_idCategoria" class="form-control">
            <?php 
                $sql_cat = "SELECT * FROM categoria";
                $res_cat = $conn->query($sql_cat);

                if($res_cat->num_rows > 0){
                    while($row_cat = $res_cat->fetch_object()){
                        print "<option value='".$row_cat->idCategoria."'>".$row_cat->nomeCategoria."</option>";
                    }
                }
                else{
                    print "<option>Não há categorias cadastradas cadastrados</option>";
                }
            ?>


        </select>
    </div> 
    <div class="mb-3">
        <label>Ano de Fabricação</label><br>
        <input type="number" id="ano" name="anoFabricacao" min="1900" max="2100" required>
    </div>
    <div class="mb-3">
      <label>Placa do veiculo</label>
      <input type="text" name="placa" class="form-control" maxlength="9" id="placaInput" placeholder="XXX0X00">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar Veiculo</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const placaInput = document.getElementById('placaInput');

    placaInput.addEventListener('input', function(event) {
        const inputValue = event.target.value;
        const formattedValue = formatPlaca(inputValue);
        event.target.value = formattedValue;
    });

    function formatPlaca(value) {
        // Remove caracteres não permitidos
        const cleanedValue = value.replace(/[^a-zA-Z0-9]/g, '');

        // Aplica a máscara
        let formattedValue = '';
        for (let i = 0; i < cleanedValue.length; i++) {
        if (i === 2 || i === 5) {
            formattedValue += cleanedValue[i] !== '-' ? '-' : '';
        }
        formattedValue += cleanedValue[i];
        }

        return formattedValue.substring(0, 9); // Ajusta para o comprimento máximo de 8 caracteres
    }
    });

    function validarFormulario() {
        var modelo_idModelo = document.getElementById('modelo_idModelo').value.trim();
        var categoria_idCategoria = document.getElementById('categoria_idCategoria').value.trim();
        var ano = document.getElementById('ano').value.trim();
        var placa = document.getElementById('placaInput').value.trim();

        if (modelo_idModelo === '' || categoria_idCategoria === '' ||ano === '' || placa === '') {
            alert('Por favor, preencha todos os campos.');
            return false; // Impede o envio do formulário se o campo estiver vazio
        }
        //mudar para 9
        if (placa.length != 9) {
            alert('Por favor, preencha a placa corretamente.');
            return false; // Impede o envio do formulário se o campo estiver vazio
        }

        return true;
    }

</script>
