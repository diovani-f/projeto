<h1>Editar Pessoa!</h1>
<?php
    $sql = "SELECT * FROM pessoa WHERE idPessoa=".$_REQUEST['idPessoa'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
    $idPessoa = $_REQUEST['idPessoa'];
?>

<form action="?page=p-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="idPessoa" value="<?php print $idPessoa;?>">
  <div class="mb-3">
    <label>Nome da Pessoa</label>
    <input type="text" name="nomePessoa" id="nomePessoa" class="form-control" value="<?php print $row->nomePessoa;?>">
  </div>
  <div class="mb-3">
    <label>CPF</label>
    <input type="text" name="cpf" id="cpf" class="form-control" oninput="applyCpfMask(this)" maxlength="14" value="<?php print $row->cpf;?>">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-success">Editar Categoria</button>
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

    if (nomePessoa === '' || cpf.length === '') {
      alert('Por favor, preencha todos os campos.');
      return false; // Impede o envio do formulário se algum campo estiver vazio
    }
    if (cpf.length != 11) {
      alert(cpf.length);
      alert('Por favor, preencha o cpf corretamente.');
      return false; // Impede o envio do formulário se algum campo estiver vazio
    }

    return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
  }
</script>
