<?php
    include_once "php/conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
		$sql="select * from produto";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($result)){
			echo'<a href="teste2.php?'.$row['nome_produto'].'"><img src="img/produtos/'.$row['img'].'"  style="width:200px; height:200px;"></a>';
		}
	?>
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Produto</th>
                  <th>Preço</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $_SESSION['nome_produto'];?></td>
                  <td></td>
                </tr>
               
              </tbody>
            </table>
          </div>
                  
           

</body>
</html>