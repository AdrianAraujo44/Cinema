<?php
     include_once "conexao.php";
    $cpf=$_GET['deletar'];
   $sql = "delete from funcionario where cpf=$cpf";
    mysqli_query($con,$sql);	
    header('location:../ListaFunc.php');	
?>
?>