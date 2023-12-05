<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
       
            $sql = "INSERT INTO veiculo (placa, categoria_idCategoria, modelo_idModelo, anoFabricacao) VALUES ('".$_POST['placa']."', ".$_POST['categoria_idCategoria'].", ".$_POST['modelo_idModelo'].", ".$_POST['anoFabricacao'].")";
            $res = $conn->query($sql);

            if($conn->error){
                print "<script>alert('$conn->error');</script>";
                print "<script>location.href='?page=veiculo-cadastrar';</script>";
            }else{
                if($res==true){
                    print "<script>alert('Cadastro realizado com sucesso!');</script>";
                    print "<script>location.href='?page=veiculo-listar';</script>";
                }
                else{
                    print "<script>alert('Cadastro falhou!');</script>";
                    print "<script>location.href='?page=veiculo-cadastrar';</script>";
                }
            }


        break;  
    case 'editar':
            $sql = "UPDATE veiculo SET 
            placa ='".$_POST['placa']."', 
            modelo_idModelo=".$_POST['modelo_idModelo'].",
            categoria_idCategoria=".$_POST['categoria_idCategoria'].",
            anoFabricacao=".$_POST['anoFabricacao']."
            WHERE idVeiculo=".$_POST['idVeiculo'];
            $res = $conn->query($sql);

            if($conn->error){
                print "<script>alert('$conn->error');</script>";
                print "<script>location.href='?page=veiculo-cadastrar';</script>";
            }else{
                if($res==true){
                    print "<script>alert('Edição realizada com sucesso!');</script>";
                    print "<script>location.href='?page=veiculo-listar';</script>";
                }
                else{
                    print "<script>alert('Edição falhou!');</script>";
                    print "<script>location.href='?page=veiculo-cadastrar';</script>";
                }
            }

        break;
    
    case 'excluir':
        $sql = "DELETE FROM veiculo where idVeiculo=".$_REQUEST['idVeiculo'];
        $res = $conn->query($sql);
        
        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=veiculo-listar';</script>";
        } else {
            print "<script>alert('Exclusão FALHOU! Há propriedades cadastradas com esse veiculo!');</script>";
            print "<script>location.href='?page=veiculo-listar';</script>";
        }
        

        break;
}
?>