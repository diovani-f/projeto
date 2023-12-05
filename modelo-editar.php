<h1>Editar modelo!</h1>
<?php
    $sql_1 = "SELECT * FROM modelo WHERE idModelo=".$_REQUEST['idModelo'];
    $res_1 = $conn->query($sql_1);
    $row_1 = $res_1->fetch_object();
    $idModelo = $_REQUEST['idModelo'];
?>
<form action="?page=modelo-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idModelo" value="<?php print $idModelo;?>">
  <div class="mb-3">
        <label>Marca</label>
        <select name="marca_idMarca" id="marca_idMarca" class="form-control">
            <?php 
                $sql = "SELECT * FROM marca";
                $res = $conn->query($sql);

                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        if($row_1->marca_idMarca == $row->idMarca){
                            print "<option value='".$row->idMarca."' selected>".$row->nomeMarca."</option>";
                        }else{
                            print "<option value='".$row->idMarca."'>".$row->nomeMarca."</option>";
                        }
                    }
                }
                else{
                    print "<option>Não há marcas cadastradas</option>";
                }
            ?>
        </select>
    </div>  
    <div class="mb-3">
        <label>Nome do Modelo</label>
        <input type="text" name="nomeModelo" id="nomeModelo" class="form-control" value="<?php print $row_1->nomeModelo;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Editar Modelo</button>
    </div>
</form>
<script>
  function validarFormulario() {
    var nomeModelo = document.getElementById('nomeModelo').value.trim();
    var marca_idMarca = document.getElementById('marca_idMarca').value.trim();

    if (nomeModelo === '' || marca_idMarca === '') {
      alert('Por favor, preencha todos os campos.');
      return false; // Impede o envio do formulário se o campo estiver vazio
    }
    return true;
  }
</script>

