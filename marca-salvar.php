<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
            $sql = "INSERT INTO marca (nomeMarca) VALUES ('".$_POST['nomeMarca']."')";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso!');</script>";
                print "<script>location.href='?page=marca-listar';</script>";
            }
            else{
                print "<script>alert('Cadastro FALHOU!');</script>";
                print "<script>location.href='?page=marca-cadastrar';</script>";
            }
        break;  
    case 'editar':
            $sql = "UPDATE marca SET nomeMarca='".$_POST['nomeMarca']."' WHERE idMarca=".$_POST["idMarca"];
            $res = $conn->query($sql);
    
            if($res==true){
                print "<script>alert('Edição realizada com sucesso!');</script>";
                print "<script>location.href='?page=marca-listar';</script>";
            }
            else{
                print "<script>alert('Edição FALHOU!');</script>";
                print "<script>location.href='?page=marca-listar';</script>";
            } 
        break;
    
    case 'excluir':
        $sql = "DELETE FROM marca where idMarca=".$_REQUEST['idMarca'];
        $res = $conn->query($sql);

        file_put_contents("texto.txt", $res);

        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=marca-listar';</script>";
        }
        else{
            print "<script>alert('Exclusão FALHOU! Há modelos cadastrados com essa marca!');</script>";
            print "<script>location.href='?page=marca-listar';</script>";
        } 

        break;
}


?>