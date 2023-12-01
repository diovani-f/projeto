<h1>Cadastrar nova pessoa!</h1>

<form id="cadastroForm" action="?page=p-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar" required>
  <div class="mb-3">
    <label>Nome da Pessoa</label>
    <input type="text" name="nomePessoa" id="nomePessoa" class="form-control">
  </div>
  <div class="mb-3">
    <label>CPF</label>
    <input type="text" name="cpf" id="cpf" oninput="applyCpfMask(this)" class="form-control" maxlength="14">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-success">Cadastrar Pessoa</button>
  </div>
</form>

<script>
  function applyCpfMask(input) {
    var value = input.value.replace(/\D/g, '');
    if (value.length > 3) {
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
    }

    if (value.length > 6) {
      value = value.replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
    }

    if (value.length > 9) {
      value = value.replace(/(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
    }
    input.value = value;
  }
  
  function validarFormulario() {
    var nomePessoa = document.getElementById('nomePessoa').value.trim();
    var cpf = document.getElementById('cpf').value.replace(/\D/g, ''); // Remove não numéricos

    if (nomePessoa === '' || cpf === '') {
      alert('Por favor, preencha todos os campos.');
      return false; // Impede o envio do formulário se algum campo estiver vazio
    }
    if (cpf.length != 11) {
      alert('Por favor, preencha o cpf corretamente.');
      return false; // Impede o envio do formulário se algum campo estiver vazio
    }

    return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
  }
</script>
