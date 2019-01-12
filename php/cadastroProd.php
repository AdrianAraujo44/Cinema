<?php
	include_once "conexao.php";
    $arquivo = isset($_FILES['foto'])?$_FILES['foto']:"";
    $preco = $_POST['preco'];
    $nomeP = $_POST['nomeProd'];
    $quantidade = $_POST['quantidade'];

    if(isset($_FILES['foto'])){
        $imagem = $arquivo['name'];
        move_uploaded_file($_FILES['foto'] ['tmp_name'],'../img/Produtos/' . $imagem);

         $sql = "insert into produto(id_produto,nome_produto,preco,img,quantidade) values (null,'$nomeP','$preco','$imagem','$quantidade')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas != 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                echo " Erro ao cadastrar!";
            }
       }
?>