<h1>Veiculos sem propriedade!</h1>
<?php
    $sql = "SELECT * FROM veiculos_sem_propriedade";

    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Placa do Veiculo</th>";
        print "<th>Modelo</th>";
        print "<th>Marca</th>";
        print "<th>Categoria</th>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idVeiculo."</td>";
            print "<td>".$row->placa."</td>";
            print "<td>".$row->nomeModelo."</td>";
            print "<td>".$row->nomeMarca."</td>";
            print "<td>".$row->nomeCategoria."</td>";
            print "</tr>";
        }
        print "</table>";
    }
    else{
        print "<p>Nenhum resultado encontrado!</p>";
    }

?>
<h1>Veiculos com propriedade!</h1>
<?php
    $sql_1 = "SELECT * FROM veiculos_com_propriedade";

    $res_1 = $conn->query($sql_1);
    $qtd_1 = $res_1->num_rows;

    if($qtd_1  > 0){
        print "<p>Encontrou <b>$qtd_1</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do Proprietário</th>";
        print "<th>Placa do Veiculo</th>";
        print "<th>Modelo</th>";
        print "<th>Marca</th>";
        print "<th>Categoria</th>";
        print "<th>Ano de Fabricacao</th>";
        print "<th>Data de Compra</th>";
        print "<th>Data de Venda</th>";

        while($row_1 = $res_1->fetch_object()){
            print "<tr>";
            print "<td>".$row_1->idVeiculo."</td>";
            print "<td>".$row_1->nomeProprietario."</td>";
            print "<td>".$row_1->placa."</td>";
            print "<td>".$row_1->nomeModelo."</td>";
            print "<td>".$row_1->nomeMarca."</td>";
            print "<td>".$row_1->nomeCategoria."</td>";
            print "<td>".$row_1->anoFabricacao."</td>";
            print "<td>".$row_1->dataCompra."</td>";
            print "<td>".$row_1->dataVenda."</td>";
            print "</tr>";
        }
        print "</table>";
    }
    else{
        print "<p>Nenhum resultado encontrado!</p>";
    }

?>