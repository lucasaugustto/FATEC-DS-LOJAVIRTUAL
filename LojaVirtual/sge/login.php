<?php 
//include_once('../conexao.php');

$_SESSION['status_usuario']=0;
if(isset($_POST['entrar'])){
    Entrar();
} 
	function Entrar(){
    include_once('../conexao.php');

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
                $_SESSION['status_usuario']=$row['id_usuario_cliente'];
                
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
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color: #343a40;">
		<div style="width: 500px;height: 300px; margin:0 auto;">
			<form action="login.php" method="post">
				<h3>Área Administrativa - Acessar</h3>
			  <div class="form-group">
			    <input type="email" class="form-control" placeholder="Digite seu email" name="txtEmail">
			    <br>
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="txtSenha">
			    <br>
			  </div>
			  
			  <button type="submit" class="btn btn-primary" name="entrar">Entrar</button>
			</form>
		</div>
</body>
</html>