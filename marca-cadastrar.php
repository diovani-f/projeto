<h1>Cadastrar nova marca!</h1>

<form action="?page=marca-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome da Marca</label>
        <input type="text" name="nomeMarca" id="nomeMarca" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar Marca</button>
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
