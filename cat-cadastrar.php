<h1>Cadastrar nova Categoria!</h1>

<form action="?page=cat-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar" required>
  <div class="mb-3">
    <label>Nome da Categoria</label>
    <input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-success">Cadastrar Categoria</button>
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
