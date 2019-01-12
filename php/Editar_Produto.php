<?php
	include_once "conexao.php";
	$arquivo = isset($_FILES['foto'])?$_FILES['foto']:"";
	$id = $_GET['id'];
	$nome_prod=$_POST['nomeProd'];
	$preco = $_POST['preco'];
	$quant = $_POST['quantidade'];

	if(empty($arquivo['name'])){
			$sql = "update produto set nome_produto ='$nome_prod', preco ='$preco', quantidade ='$quant' where Id_produto ='$id'";
			mysqli_query($con,$sql);
			$linhas = mysqli_affected_rows($con);
            if($linhas > 0){
                echo "Cadastrado com sucesso!";
                header('location:../Lista_Produtos.php');
            }else{
                echo " Erro ao cadastrar!";
            }
	}else{
		$imagem = $arquivo['name'];
        move_uploaded_file($_FILES['foto'] ['tmp_name'],'../img/Produtos/' . $imagem);
$sql = "update produto set nome_produto='$nome_prod',preco='$preco', img='$imagem',  quantidade='$quant' where Id_produto='$id'";
	mysqli_query($con,$sql);	
	$linhas = mysqli_affected_rows($con);

            if($linhas > 0){
                echo "Cadastrado com sucesso!";
                header('location:../Lista_Produtos.php');
            }else{
                echo " Erro ao cadastrar!";
            }
	}
?>