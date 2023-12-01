<!-- //inserir marca ao modelo -->
<h1>Listar Propriedade</h1>
<?php
    $sql = "SELECT *
    FROM propriedade
    INNER JOIN veiculo ON propriedade.veiculo_idVeiculo = veiculo.idVeiculo
    INNER JOIN modelo ON veiculo.modelo_idModelo = modelo.idModelo
    INNER JOIN marca ON modelo.marca_idMarca = marca.idMarca
    INNER JOIN pessoa ON propriedade.pessoa_idPessoa = pessoa.idPessoa;";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do modelo</th>";
        print "<th>Dono do Veiculo</th>";
        print "<th>Data de compra</th>";
        print "<th>Data de venda</th>";
        print "<th>Placa do Veiculo</th>";
        print "<th>Ações</th>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idVeiculo."</td>";
            print "<td>".$row->nomeModelo." - ".$row->nomeMarca."</td>";
            print "<td>".$row->nomePessoa."</td>";
            print "<td>".$row->dataCompra."</td>";
            print "<td>".$row->dataVenda."</td>";
            print "<td>".$row->placa."</td>";
            print "<td>
            <button class='btn btn-primary' onclick=\"location.href='?page=propriedade-editar&idPropriedade=".$row->idPropriedade."';\">Editar</button>

            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                                                            {location.href='?page=propriedade-salvar&acao=excluir&idPropriedade=".$row->idPropriedade."';}
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