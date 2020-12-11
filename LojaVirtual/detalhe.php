<?php  
	include_once('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commerce - Detalhes</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	 
		<?php include_once('nav.php'); ?>
		
		<br><br><br>
		
		<?php  	
				if (isset($_GET['produto'])) {
					$_SESSION['produto']=$_GET['produto'];
				}
				

		  		$sql="select * from tbl_produto where id_produto='".$_SESSION['produto']."';";
			    $result = $connection->prepare($sql);
			    $result->execute();

   				 while($row = $result->fetch(PDO::FETCH_ASSOC)){
		  	?>
		  	<h3 style="text-align: center;"><?php echo"{$row['nome']}" ?></h3>
			<div class="card" style="margin: 0 auto;width: 290px;" >
				<div class="card" style="width: 18rem;" class="float-left">
					
					<?php echo"<img class='card-img-top' src='img/upload/{$row['foto']}' height='220px'>
					" ?>
					<div class="card-body">
						
						<p class="card-text">
							<?php echo"{$row['descricao']}" ?>
						</p>
						
						<p class="text-success">R$ <?php echo"{$row['preco']}" ?></p>
						
						
					</div>
				</div>
			</div> &nbsp;&nbsp;&nbsp;&nbsp;
			<?php } ?>


			<?php include_once('comentarios.php'); ?>


		<footer> <a href="sge/login.php"> <p>Área Administrativa</p> </a> </footer> 
		 
		
</body>
</html>