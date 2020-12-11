<?php 

$sql="select * from tbl_produto where nome like'%'".$_POST['txtPesquisa']."'%';";
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
			<?php } ?>