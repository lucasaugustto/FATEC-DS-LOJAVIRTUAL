<?php  
	include_once('conexao.php');
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
<body>
	 
		<?php include_once('nav.php'); ?>
		<br><br>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		   
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="img/upload/1.jpg" width="800px" height="400px" >
		    </div>
		   
		    <div class="carousel-item">
		      <img class="d-block w-100" src="img/upload/3.jpg" width="800px" height="400px">
		    </div>

		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		   
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		   
		  </a>
		</div>
		<br><br><br>
		<div class="card-group">
			<?php
				/*if (isset($_POST['btnPesquisar'])) {
				  	include_once('indexpes.php');
				  }else{*/
				  	$sql="SELECT * FROM tbl_produto";
				    $result = $connection->prepare($sql);
				    $result->execute();

	   				 while($row = $result->fetch(PDO::FETCH_ASSOC)){

		  		
		  	?>
			<div class="card-deck">
				<div class="card" style="width: 18rem;" class="float-left">
					
					<?php echo"<img class='card-img-top' src='img/upload/{$row['foto']}' height='220px'>
					" ?>
					<div class="card-body">
						<h5 class="card-title" id="desc"><?php echo"{$row['nome']}" ?></h5>
						<p class="card-text">
							<?php echo"{$row['descricao']}" ?>
						</p>
						<a href="detalhe.php?produto=<?php echo"{$row['id_produto']}" ?>"> <p>Mais Detalhes</p> </a>
						<p class="text-success" > R$<span id="value"><?php echo"{$row['preco']}" ?></span> </p>
						<form action="index.php" method="post">
							
						</form>
						<input type="number"  id="amount" class="form-control"><br>
						
						<button  onclick="addData();" class="btn btn-primary" >Adicionar</button>
						
					</div>
				</div>
			</div> &nbsp;&nbsp;&nbsp;&nbsp;
			<?php }  /*}*/ ?>
		</div>
<br><br>
		<!-- -->
		<?php 

			 if (isset($_SESSION['nome_cliente'])){
             	include_once('carrinho.php');
            }else{
              
            }
		 ?>

		<footer> <a href="sge/login.php"> <p>Área Administrativa</p> </a> </footer>

	<script type="text/javascript" src="js/config.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
		
</body>
</html>