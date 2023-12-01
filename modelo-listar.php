<h1>Modelo listar</h1>
<?php
    $sql = "SELECT * FROM modelo INNER JOIN marca on modelo.marca_idMarca = marca.idMarca";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do modelo</th>";
        print "<th>Nome da marca</th>";
        print "<th>Ações</th>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idModelo."</td>";
            print "<td>".$row->nomeModelo."</td>";
            print "<td>".$row->nomeMarca."</td>";
            print "<td>
            <button class='btn btn-primary' onclick=\"location.href='?page=modelo-editar&idModelo=".$row->idModelo."';\">Editar</button>

            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                                                            {location.href='?page=modelo-salvar&acao=excluir&idModelo=".$row->idModelo."';}
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