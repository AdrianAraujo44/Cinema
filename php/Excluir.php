<?php
    include_once "conexao.php";
    $id=$_GET['deletar'];
   $sql = "delete from departamento where Id_dep=$id";
    mysqli_query($con,$sql);	
    header('location:../home.php');	
?>