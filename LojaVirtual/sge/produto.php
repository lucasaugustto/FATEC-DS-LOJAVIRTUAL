<?php  
	include_once('../conexao.php');
	if(isset($_GET['editar'])){

		$sql="select * from tbl_produto where id_produto='".$_GET['editar']."';";
	    $result = $connection->prepare($sql);
	    $result->execute();
	    $row = $result->fetch(PDO::FETCH_ASSOC);

	    $nome=$row['nome'];
	    $preco=$row['preco'];
	    $descricao=$row['descricao'];
	   	$botao='editar';

	   	$_SESSION["id_editar"]=$_GET['editar'];
	}else{
		$nome=null;
	    $preco=null;
	    $descricao=null;
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
<body style="background-color: #343a40;">
	<div class="container" style="background-color: #fff;"> 

		<?php include_once('nav.php'); ?>
		<br><br>
		<h2>Cadastrar Produtos</h2>
		<form method="post" action="crud/produto.php" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nome</label>
		    <input type="text" class="form-control"  name="txtNome"  value="<?php echo($nome); ?>"
		  </div><br>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Preço</label>
		    <input type="text" class="form-control" name="txtPreco" value="<?php echo($preco); ?>"
		  </div><br>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Foto:</label>
            <input type="file" class="form-control" name="Foto" accept='image/*' >
		  </div><br>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Descrição</label>
		    <textarea class="form-control" name="txtDescricao"><?php echo($descricao); ?></textarea>
		  </div><br>
		  <button type="submit" class="btn btn-primary" name="<?php echo($botao); ?>"><?php echo($botao); ?></button>
		</form><br><br><br>

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Produto</th>
		      <th scope="col">Preco</th>
		      <th scope="col"> Descrição</th>
		      <th scope="col">Foto</th>
		      <th scope="col">Editar</th>
		      <th scope="col">Excluir</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php  
		  		$sql="select * from tbl_produto";
			    $result = $connection->prepare($sql);
			    $result->execute();

   				 while($row = $result->fetch(PDO::FETCH_ASSOC)){
		  	?>
		    <tr>
		      <th scope="row"> <?php echo"{$row['id_produto']}" ?> </th>
		      <td> <?php echo"{$row['nome']}" ?> </td>
		      <td> <?php echo"{$row['preco']}" ?> </td>
		      <td> <?php echo"{$row['descricao']}" ?> </td>
		      <td>  <?php echo" <img src='../img/upload/{$row['foto']}' width='25%' > " ?> </td>
		      <td> <a href="produto.php?editar=<?php echo"{$row['id_produto']}" ?>"> <img src="../img/icon/update.png"> </a> </td>
		      <td> <a href="crud/produto.php?deletar=<?php echo"{$row['id_produto']}" ?>"> <img src="../img/icon/delete.png"> </a> </td>
		    </tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</body>