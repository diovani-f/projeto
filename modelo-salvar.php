<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
            $sql = "INSERT INTO modelo (nomeModelo, marca_idMarca) VALUES ('".$_POST['nomeModelo']."', ".$_POST['marca_idMarca'].")";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso!');</script>";
                print "<script>location.href='?page=modelo-listar';</script>";
            }
            else{
                print "<script>alert('Cadastro FALHOU!');</script>";
                print "<script>location.href='?page=modelo-cadastrar';</script>";
            } 
        break;  
    case 'editar':
            $sql = "UPDATE modelo SET 
            nomeModelo='".$_POST['nomeModelo']."', 
            marca_idMarca=".$_POST['marca_idMarca']."
            WHERE idModelo=".$_POST['idModelo'];
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Edição realizada com sucesso!');</script>";
                print "<script>location.href='?page=modelo-listar';</script>";
            }
            else{
                print "<script>alert('Edição FALHOU!');</script>";
                print "<script>location.href='?page=modelo-listar';</script>";
            } 
        break;
    
    case 'excluir':
        $sql = "DELETE FROM modelo where idModelo=".$_REQUEST['idModelo'];
        $res = $conn->query($sql);

        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=modelo-listar';</script>";
        }
        else{
            print "<script>alert('Exclusão FALHOU!');</script>";
            print "<script>location.href='?page=modelo-listar';</script>";
        } 

        break;
}


?>