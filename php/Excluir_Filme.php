<?php
     include_once "conexao.php";
    $id=$_GET['deletar'];
   $sql = "delete from filme where Id_filme=$id";
    mysqli_query($con,$sql);	
    header('location:../Lista_filme.php');	
?>
