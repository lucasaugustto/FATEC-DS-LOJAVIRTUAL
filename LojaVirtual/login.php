<?php  

if(isset($_POST['entrar'])){
    Entrar();
} 

	function Entrar(){
	include_once('conexao.php');

	$sql="select * from tbl_usuario_cliente where email='".$_POST['txtEmail']."';";
	$result = $connection->prepare($sql);
	$result->execute();


	//echo "aqui";
	//Se o login existir redireciona para a pág de comentários novamente, caso o usuário exista
	//a 2º etapa é verificar a senha digitada.
	//Se o login não existir retorna uma mensagem de erro de login
    if($row = $result->fetch(PDO::FETCH_ASSOC >=1)){
        $senhabd=$row['senha'];

        $senhaCorreta = password_verify($_POST['txtSenha'],$senhabd);
        
        if($senhaCorreta == true){
            $_SESSION['nome_cliente']=$row['nome'];
            $_SESSION['id_cliente']=$row['id_usuario_cliente'];
            
            header('location:index.php');
        }else{
            echo"<span style='color:red;text-align:center;'> Usuário ou Senha Incorreto! </span>";
        }
    }else{
        echo"<span style='color:red;text-align:center;'> Usuário ou Senha Incorreto! </span>";
    }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commerce</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container"> 
		<?php include_once('nav.php'); ?>
		<br><br>
		<form method="post" action="login.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Endereço de email</label>
		    <input type="text" class="form-control" name="txtEmail">
		   
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Senha</label>
		    <input type="password" class="form-control" name="txtSenha">
		  </div><br>
		  <button type="submit" class="btn btn-primary" name="entrar">Entrar</button>
		</form>
	</div>
</body>