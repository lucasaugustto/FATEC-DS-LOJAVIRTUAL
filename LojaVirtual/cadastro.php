<?php  
	include_once('conexao.php');

	//echo($_SESSION['id_cliente']);
	
	if (isset($_SESSION['id_cliente'])){

	    $sql="select * from tbl_usuario_cliente where id_usuario_cliente='".$_SESSION['id_cliente']."';";
	    $result = $connection->prepare($sql);
	    $result->execute();
	    $row = $result->fetch(PDO::FETCH_ASSOC);

	    $nome=$row['nome'];
	    $email=$row['email'];
	   	$botao='editar';


	}else{
		$nome=null;
		$email=null;
		$botao='cadastrar';
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
		<form action="crud/cadastro.php" method="post">
		  <div class="form-group" >
		    <label for="exampleInputEmail1">Nome Completo</label>
		    <input type="text" class="form-control"  name="txtNome" value="<?php echo($nome) ?>">
		  </div><br>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Endereço de email</label>
		    <input type="text" class="form-control"  name="txtEmail" value="<?php echo($email) ?>">
		  </div><br>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Senha</label>
		    <input type="password" class="form-control"  name="txtSenha">
		  </div><br>
		  <button type="submit" name="<?php echo($botao); ?>" class="btn btn-primary"> <?php echo($botao); ?></button>
		</form> <br>
	</div>
</body>