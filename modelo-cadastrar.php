<h1>Cadastrar novo modelo!</h1>

<form action="?page=modelo-salvar" method="POST" onsubmit="return validarFormulario()">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
        <label>Marca</label>
        <select name="marca_idMarca" id="marca_idMarca" class="form-control">
            <?php 
                $sql = "SELECT * FROM marca";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        print "<option value='".$row->idMarca."'>".$row->nomeMarca."</option>";
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
        <input type="text" name="nomeModelo" id="nomeModelo" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar Modelo</button>
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
