<h1>Editar Veiculo!</h1>
<?php
    $sql_1 = "SELECT * FROM veiculo WHERE idVeiculo=".$_REQUEST['idVeiculo'];
    $res_1 = $conn->query($sql_1);
    $row_1 = $res_1->fetch_object();
    $idVeiculo = $_REQUEST['idVeiculo'];
?>
<form action="?page=veiculo-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idVeiculo" value="<?php print $idVeiculo;?>">
  <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_idModelo" id="modelo_idModelo" class="form-control">
            <?php 
                $sql = "SELECT * FROM modelo INNER JOIN marca on modelo.marca_idMarca = marca.idMarca";
                $res = $conn->query($sql);

                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        if($row_1->modelo_idModelo == $row->idModelo){
                            print "<option value='".$row->idModelo."' selected>".$row->nomeMarca." - ".$row->nomeModelo."</option>";
                        }else{
                            print "<option value='".$row->idModelo."'>".$row->nomeModelo."</option>";
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
            <label>Categoria</label>
            <select name="categoria_idCategoria" id="categoria_idCategoria" class="form-control">
                <?php 
                    $sql_2 = "SELECT * FROM categoria";
                    $res_2 = $conn->query($sql_2);

                    if($res_2->num_rows > 0){
                        while($row_2 = $res_2->fetch_object()){
                            if($row_1->categoria_idCategoria == $row_2->idCategoria){
                                print "<option value='".$row_2->idCategoria."' selected>".$row_2->nomeCategoria."</option>";
                            }else{
                                print "<option value='".$row_2->idCategoria."'>".$row_2->nomeCategoria."</option>";
                            }
                        }
                    }
                    else{
                        print "<option>Não há categorias cadastradas</option>";
                    }
                ?>
            </select>
        </div>  


    <div class="mb-3">
        <label>Ano de Fabricação</label>
        <input type="number" name="anoFabricacao"  id="ano" class="form-control" value="<?php print $row_1->anoFabricacao;?>">
    </div>
    <div class="mb-3">
        <label>Placa</label>
        <input type="text" name="placa" class="form-control" id="placaInput" value="<?php print $row_1->placa;?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Editar Modelo</button>
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

        return formattedValue.substring(0, 8); // Ajusta para o comprimento máximo de 8 caracteres
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
        if (placa.length != 8) {
            alert('Por favor, preencha a placa corretamente.');
            return false; // Impede o envio do formulário se o campo estiver vazio
        }

        return true;
    }

</script>
