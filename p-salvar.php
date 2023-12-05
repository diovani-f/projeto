<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
            $qntdCarros=0;
            $sql = "INSERT INTO pessoa (nomePessoa, cpf, qntdCarros) VALUES ('".$_POST['nomePessoa']."','".$_POST['cpf']."', '".$qntdCarros."')";
            $res = $conn->query($sql);

            if($conn->error){
                print "<script>alert('$conn->error');</script>";
                print "<script>location.href='?page=p-cadastrar';</script>";
            }else{
                if($res==true){
                    print "<script>alert('Cadastro realizado com sucesso!');</script>";
                    print "<script>location.href='?page=p-listar';</script>";
                }
                else{
                    print "<script>alert('Edição FALHOU!');</script>";
                    print "<script>location.href='?page=p-listar';</script>";
                }
            }
        break;  
    case 'editar':
            $sql = "UPDATE pessoa SET nomePessoa='".$_POST['nomePessoa']."', cpf='".$_POST['cpf']."' WHERE idPessoa=".$_POST["idPessoa"];
            $res = $conn->query($sql);

            if($conn->error){
                print "<script>alert('$conn->error');</script>";
                print "<script>location.href='?page=p-cadastrar';</script>";
            }else{
                if($res==true){
                    print "<script>alert('Edição realizada com sucesso!');</script>";
                    print "<script>location.href='?page=p-listar';</script>";
                }
                else{
                    print "<script>alert('Edição FALHOU!');</script>";
                    print "<script>location.href='?page=p-listar';</script>";
                }
            }

        break;
    
    case 'excluir':
        $sql = "DELETE FROM pessoa where idPessoa=".$_REQUEST['idPessoa'];
        $res = $conn->query($sql);

        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=p-listar';</script>";
        }
        else{
            print "<script>alert('Exclusão FALHOU! Há propriedades cadastradas com essa pessoa!');</script>";
            print "<script>location.href='?page=p-listar';</script>";
        } 

        break;
}


?>