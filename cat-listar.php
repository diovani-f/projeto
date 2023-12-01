<h1>Listar Categoria!</h1>
<?php
    $sql = "SELECT * FROM categoria";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome da Categoria</th>";
        print "<th>Ações</th>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idCategoria."</td>";
            print "<td>".$row->nomeCategoria."</td>";
            print "<td>
            <button class='btn btn-primary' onclick=\"location.href='?page=cat-editar&idCategoria=".$row->idCategoria."';\">Editar</button>

            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                                                            {location.href='?page=cat-salvar&acao=excluir&idCategoria=".$row->idCategoria."';}
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