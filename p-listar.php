<h1>Listar Pessoas!</h1>
<?php
    $sql = "SELECT * FROM pessoa";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd  > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>CPF</th>";
        print "<th>Nome da Pessoa</th>";
        print "<th>Ações</th>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->cpf."</td>";
            print "<td>".$row->nomePessoa."</td>";
            print "<td>
            <button class='btn btn-primary' onclick=\"location.href='?page=p-editar&idPessoa=".$row->idPessoa."';\">Editar</button>

            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                                                            {location.href='?page=p-salvar&acao=excluir&idPessoa=".$row->idPessoa."';}
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