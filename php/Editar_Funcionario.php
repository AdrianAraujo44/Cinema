<?php
    include_once "conexao.php";
    $Nome_Completo = $_POST['nomeCompleto'];
    $cpf           = $_POST['cpf'];
    $sexo          = $_POST['sexo'];
    $telefone      = $_POST['tel'];
    $endereco      = $_POST['endereco'];
    $numero        = $_POST['numero'];
    $usuario       = $_POST['usuario'];
    $senha         = $_POST['senha'];
    $tipo          = $_POST['tipo'];
    $salario       = $_POST['salario'];
    $id = $_GET['editar'];

    $sql = "update funcionario set cpf='".$cpf."',nome_func='".$Nome_Completo."',sexo='".$sexo."',salario= '".$salario."',usuario='".$usuario."',senha='".$senha."',tipo='".$tipo."',telefone='".$telefone."',numero='".$numero."',endereco='".$endereco."'  where cpf='".$id."'";
	mysqli_query($con,$sql);	
	header('location:../ListaFunc.php');

?>