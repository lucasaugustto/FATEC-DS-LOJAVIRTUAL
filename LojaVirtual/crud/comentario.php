<?php
    

    if (isset($_POST['postar'])){
        Postar();

    }else if (isset($_GET['deletar'])){
        Delete($_GET['deletar']);
    }
    

    function Postar(){
        include_once('../conexao.php');

       
        if (isset($_SESSION['id_cliente'])){
            $sql="insert into tbl_comentario (comentario, id_usuario,id_produto) 
            values('".$_POST['txtComentario']."','".$_SESSION['id_cliente']."','".$_SESSION['produto']."'
            )";
            $result = $connection->prepare($sql);
            $result->execute();

            header("location: ../detalhe.php");
        }else{
             $sql="insert into tbl_comentario (comentario, id_produto,id_usuario) 
            values('".$_POST['txtComentario']."','".$_SESSION['produto']."','".'.'."'
            );";
            $result = $connection->prepare($sql);
            $result->execute();

            //echo($sql);
            header("location: ../detalhe.php");
        }
        
    }

    
    function Delete(){
        include_once('../conexao.php');

        $sql="delete from tbl_comentario where id_comentario='".$_GET['deletar']."';";
        $result = $connection->prepare($sql);
        $result->execute();
        header("location: ../detalhe.php");
    }

   

    
?>