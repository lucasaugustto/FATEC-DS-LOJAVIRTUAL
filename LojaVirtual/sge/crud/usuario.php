<?php 

	if (isset($_POST['cadastrar'])){
        Cadastrar();

    }else if(isset($_POST['editar'])){
        Editar();
    }

    function Cadastrar(){
    	include_once('../../conexao.php');
    	$senha=$_POST['txtSenha'];
        CriptografarSenha($senha);

        $senhacriptografada=CriptografarSenha();

    	$sql="insert into tbl_usuario_cliente (nome, email,senha,tipo) 
        values('".$_POST['txtNome']."','".$_POST['txtEmail']."','".$senhacriptografada."','".'A'."'
        )";
        $result = $connection->prepare($sql);
        $result->execute();

        header("location: ../usuario.php");
    }

    
    function Editar (){
        include_once('../../conexao.php');
        if ($_POST['txtSenha'] == '') {
            $sql="update   tbl_usuario_cliente 
        set nome='".$_POST['txtNome']."', email='".$_POST['txtEmail']."'
         where id_usuario_cliente='".$_SESSION['status_usuario']."'; ";
        $result = $connection->prepare($sql);
        $result->execute();

        header("location: ../usuario.php");
        /*echo "editar sem senha <br>";
        echo($sql);*/
        }else{

            $senha=$_POST['txtSenha'];
            CriptografarSenha($senha);

            $senhacriptografada=CriptografarSenha();

            $sql="update   tbl_usuario_cliente 
        set nome='".$_POST['txtNome']."', email='".$_POST['txtEmail']."', senha='".$senhacriptografada."'
         where id_usuario_cliente='".$_SESSION['status_usuario']."'; ";
        $result = $connection->prepare($sql);
        $result->execute();
        /*echo "editar COM senha<br>";
        echo($sql);*/

        header("location: ../usuario.php");
        }
    }

    function CriptografarSenha(){
        $senha= password_hash($_POST['txtSenha'], PASSWORD_DEFAULT);
        return $senha;
    }
?>