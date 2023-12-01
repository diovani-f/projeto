
<h1>Editar marca!</h1>
<?php
    $sql = "SELECT * FROM MARCA WHERE idMarca=".$_REQUEST['idMarca'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
    $idMarca = $_REQUEST['idMarca'];
?>
<form action="?page=marca-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idMarca" value="<?php print $idMarca;?>">
    <div class="mb-3">
        <label>Nome da Marca</label>
        <input type="text" name="nomeMarca" id="nomeMarca" class="form-control" value="<?php print $row->nomeMarca;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Editar Marca</button>
    </div>
</form>
<script>
  function validarFormulario() {
    var nomeMarca= document.getElementById('nomeMarca').value.trim();

    if (nomeMarca === '') {
      alert('Por favor, preencha todos os campos.');
      return false; // Impede o envio do formulário se o campo estiver vazio
    }

    return true;
  }
</script>
