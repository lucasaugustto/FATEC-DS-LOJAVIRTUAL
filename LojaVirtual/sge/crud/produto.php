<?php
    

    if (isset($_POST['cadastrar'])){
        Cadastrar();

    }else if (isset($_GET['deletar'])){
        Delete($_GET['deletar']);
    }
    else if (isset($_POST['editar'])){
        
        Editar();

    }


    function Cadastrar(){
        include_once('../../conexao.php');
        $foto = $_FILES['Foto'];
    
        $nameImagem = md5($foto['name'].rand(0,9999));
		$tipo = substr($foto['name'], -4);
		$nomecompleto = "{$nameImagem}{$tipo}";

		$imagem = $foto['tmp_name'];
		//$nomeproduto = $_POST['produto'];

		move_uploaded_file($imagem, "../../img/upload/{$nomecompleto}");
        //


        $sql="insert into tbl_produto (nome, preco,foto,descricao) 
        values('".$_POST['txtNome']."','".$_POST['txtPreco']."','".$nomecompleto."','".$_POST['txtDescricao']."'
        )";
        $result = $connection->prepare($sql);
        $result->execute();

        header("location: ../produto.php");
    }

     function Delete(){
        include_once('../../conexao.php');

        $sql="delete from tbl_produto where id_produto='".$_GET['deletar']."';";
        $result = $connection->prepare($sql);
        $result->execute();
        header("location: ../produto.php");
    }

    function Editar(){
        include_once('../../conexao.php');

        $sql="update  tbl_produto set nome='".$_POST['txtNome']."', preco='".$_POST['txtPreco']."', descricao='".$_POST['txtDescricao']."' where id_produto='".$_SESSION['id_editar']."';";
        $result = $connection->prepare($sql);
        $result->execute();

        //echo($sql);
        header("location: ../produto.php");
    }

    
?>