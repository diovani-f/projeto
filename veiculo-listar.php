<!-- //inserir marca ao modelo -->
<h1>Listar Veiculo</h1>
<?php
    $sql = "SELECT *
    FROM veiculo
    INNER JOIN modelo ON veiculo.modelo_idModelo = modelo.idModelo
    INNER JOIN categoria ON veiculo.categoria_idCategoria = categoria.idCategoria
    INNER JOIN marca ON modelo.marca_idMarca = marca.idMarca;";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do modelo</th>";
        print "<th>Categoria</th>";
        print "<th>Ano de Fabricação</th>";
        print "<th>Placa do Veiculo</th>";
        print "<th>Ações</th>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idVeiculo."</td>";
            print "<td>".$row->nomeModelo." - ".$row->nomeMarca."</td>";
            print "<td>".$row->nomeCategoria."</td>";
            print "<td>".$row->dataFabricacao."</td>";
            print "<td>".$row->placa."</td>";
            print "<td>
            <button class='btn btn-primary' onclick=\"location.href='?page=veiculo-editar&idVeiculo=".$row->idVeiculo."';\">Editar</button>

            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                                                            {location.href='?page=veiculo-salvar&acao=excluir&idVeiculo=".$row->idVeiculo."';}
                                                    else
                                                            {false;}\">Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";
    }
    else{
        print "<p>Nenhum resultado encontrado!</p>";
    }

?>