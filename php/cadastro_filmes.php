<?php
	include_once "conexao.php";
    $arquivo = isset($_FILES['foto'])?$_FILES['foto']:"";
    $preco = $_POST['preco'];
    $filme = $_POST['nomeF'];
    $ano = $_POST['ano'];
    $duracao = $_POST['duracao'];
    $class = $_POST['class'];
    $genero = $_POST['genero'];

    if(isset($_FILES['foto'])){
        $imagem = $arquivo['name'];
        move_uploaded_file($_FILES['foto'] ['tmp_name'],'../img/filmes/' . $imagem);

         $sql = "insert into filme(id_filme,nome_filme,duracao,dt_lancamento,class,genero,img) values (null,'$filme','$duracao','$ano','$class','$genero','$imagem')";
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