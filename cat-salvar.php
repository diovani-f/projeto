<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':

            $sql = "INSERT INTO categoria (nomeCategoria) VALUES ('".$_POST['nomeCategoria']."')";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso!');</script>";
                print "<script>location.href='?page=cat-listar';</script>";
            }
            else{
                print "<script>alert('Cadastro FALHOU!');</script>";
                print "<script>location.href='?page=cat-cadastrar';</script>";
            } 
        break;  
    case 'editar':
            $sql = "UPDATE categoria SET nomeCategoria='".$_POST['nomeCategoria']."' WHERE idCategoria=".$_POST["idCategoria"];
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Edição realizada com sucesso!');</script>";
                print "<script>location.href='?page=cat-listar';</script>";
            }
            else{
                print "<script>alert('Edição FALHOU!');</script>";
                print "<script>location.href='?page=cat-listar';</script>";
            } 
        break;
    
    case 'excluir':
        $sql = "DELETE FROM categoria where idCategoria=".$_REQUEST['idCategoria'];
        $res = $conn->query($sql);

        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=cat-listar';</script>";
        }
        else{
            print "<script>alert('Exclusão FALHOU! Você não pode apagar uma categoria, pois ela esta sendo utilizado em um veiculo!');</script>";
            print "<script>location.href='?page=cat-listar';</script>";
        } 

        break;
}


?>