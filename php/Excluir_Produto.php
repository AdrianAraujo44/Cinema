<?php
     include_once "conexao.php";
    $id=$_GET['deletar'];
   $sql = "delete from produto where Id_produto=$id";
    mysqli_query($con,$sql);	
    header('location:../Lista_Produtos.php');	
?>
?>