<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':

            $inputC = $_POST['dataCompra'];
            if($_POST['dataVenda'] == NULL){
                $inputV = '0000-00-00';
            }else{
                $inputV = $_POST['dataVenda'];
            }

            // Convertendo para o formato do MySQL (YYYY-MM-DD)
            $dataC = date("'Y-m-d'", strtotime($inputC));
            $dataV = date("'Y-m-d'", strtotime($inputV));
            
            $sql = "INSERT INTO propriedade (pessoa_idPessoa, dataCompra, dataVenda, veiculo_idVeiculo) VALUES ('".$_POST['pessoa_idPessoa']."', ".$dataC.", ".$dataV.", ".$_POST['veiculo_idVeiculo'].")";
            $res = $conn->query($sql);


            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso!');</script>";
                print "<script>location.href='?page=propriedade-listar';</script>";
            }
            else{
                print "<script>alert('Cadastro FALHOU!');</script>";
                print "<script>location.href='?page=propriedade-cadastrar';</script>";
            } 

        break;  
    case 'editar':

        $inputC = $_POST['dataCompra'];
            if($_POST['dataVenda'] == NULL){
                $inputV = '0000-00-00';
            }else{
                $inputV = $_POST['dataVenda'];
            }

            $dataC = date("'Y-m-d'", strtotime($inputC));
            $dataV = date("'Y-m-d'", strtotime($inputV));

            $sql = "UPDATE propriedade SET 
            pessoa_idPessoa ='".$_POST['pessoa_idPessoa']."', 
            veiculo_idVeiculo=".$_POST['veiculo_idVeiculo'].",
            dataCompra=".$dataC.",
            dataVenda=".$dataV."
            WHERE idPropriedade=".$_POST['idPropriedade'];
            $res = $conn->query($sql);


            if($res==true){
                print "<script>alert('Edição realizada com sucesso!');</script>";
                print "<script>location.href='?page=propriedade-listar';</script>";
            }
            else{
                print "<script>alert('Edição FALHOU!');</script>";
                print "<script>location.href='?page=propriedade-listar';</script>";
            } 


        break;
    
    case 'excluir':
        $sql = "DELETE FROM propriedade where idPropriedade=".$_REQUEST['idPropriedade'];
        $res = $conn->query($sql);

        if($conn->affected_rows > 0){
            print "<script>alert('Apagou com sucesso!');</script>";
            print "<script>location.href='?page=propriedade-listar';</script>";
        }
        else{
            print "<script>alert('Exclusão FALHOU!');</script>";
            print "<script>location.href='?page=propriedade-listar';</script>";
        } 

        break;
}
?>