<h1>Editar Categoria !</h1>
<?php
    $sql = "SELECT * FROM categoria WHERE idCategoria=".$_REQUEST['idCategoria'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
    $idCategoria = $_REQUEST['idCategoria'];
?>
<form action="?page=cat-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idCategoria" value="<?php print $idCategoria;?>">
    <div class="mb-3">
        <label>Nome da Categoria</label>
        <input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control" value="<?php print $row->nomeCategoria;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Editar Categoria</button>
    </div>
</form>

<script>
  function validarFormulario() {
    var nomeCategoria = document.getElementById('nomeCategoria').value.trim();

    if (nomeCategoria === '') {
      alert('Por favor, preencha o campo Nome da Categoria.');
      return false; // Impede o envio do formulário se o campo estiver vazio
    }

    return true;
  }
</script>

