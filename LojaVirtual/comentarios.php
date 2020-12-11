<div style='margin: 0 auto;width: 800px;'>
	<form action="crud/comentario.php" method="post">
		<textarea class="form-control" name="txtComentario"></textarea><br>
		<button type="submit" class="btn btn-primary" name="postar">Postar</button>
	</form><br><br>
</div>

<?php  
	$sql="select * FROM tbl_comentario as c inner join tbl_usuario_cliente as u ON (c.id_usuario = u.id_usuario_cliente) where id_produto='".$_SESSION['produto']."';";
    $result = $connection->prepare($sql);
    $result->execute();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		if (isset($_SESSION['nome_cliente'])){
			if ($_SESSION['nome_cliente'] == $row['nome']) {
				echo"
					<div class='card' style='margin: 0 auto;width: 800px;'>
						<p> {$row['nome']}</p> 
						<p> {$row['comentario']} </p>
						<a href='crud/comentario.php?deletar={$row['id_comentario']}'>
			                    <img src='img/icon/delete.png' style='float:right;margin-top:-80px;'>
			            </a>
		            </div> <br>
				";
			}else{
				echo"
					<div class='card' style='margin: 0 auto;width: 800px;'>
						<p> {$row['nome']}</p> 
						<p> {$row['comentario']} </p>
						
		            </div> <br>
				";
			}
		}
		
	}

	$sql="select * FROM tbl_comentario where id_usuario='.' and id_produto='".$_SESSION['produto']."';";
    $result = $connection->prepare($sql);
    $result->execute();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		echo"
				<div class='card' style='margin: 0 auto;width: 800px;'>
					<p> Anônimo </p> 
					<p> {$row['comentario']} </p>
					
	            </div> <br>
			";
	}
?>