<?php
     include_once "conexao.php";
    $id=$_GET['deletar'];
   $sql = "delete from genero where Id_genero=$id";
    mysqli_query($con,$sql);	
    header('location:../home.php');	
?>
?>