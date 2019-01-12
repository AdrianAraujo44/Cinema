<?php
    include_once "conexao.php";
    $arquivo = isset($_FILES['foto'])?$_FILES['foto']:"";
    $filme = $_POST['nomeF'];
    $ano = $_POST['ano'];
    $duracao = $_POST['duracao'];
    $class = $_POST['class'];
    $genero = $_POST['genero'];
    $id = $_GET['editar'];

if(empty($arquivo['name'])){
        $sql = "update filme set nome_filme ='$filme', duracao = '$duracao' , dt_lancamento = '$ano',class = '$class', genero = '$genero' where Id_filme='$id'";

        $res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas > 0){
                echo "Cadastrado com sucesso!";
                header('location:../Lista_Filme.php');
            }else{
                echo " Erro ao cadastrar!";
            }
}else{
        $imagem = $arquivo['name'];
        move_uploaded_file($_FILES['foto'] ['tmp_name'],'../img/filmes/' . $imagem);
         $sql = "update filme set nome_filme ='$filme', duracao = '$duracao' , dt_lancamento = '$ano',class = '$class', genero = '$genero',img ='$imagem' where Id_filme='$id'";
        
    $res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas > 0){
                echo "Cadastrado com sucesso!!";
                header('location:../Lista_Filme.php');
            }else{
                echo " Erro ao cadastrar!";
            }
       }
?>