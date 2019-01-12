<?php
    include_once "conexao.php";
	$nome = $_POST['nomeCompleto'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$tel = $_POST['tel'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$departamento = $_POST['departamento'];
	$salario = $_POST['salario'];
	$tipo = $_POST['tipo'];
	

    $sql = "insert into funcionario(cpf,nome_func,sexo,salario,departamento,usuario,senha,tipo,telefone,numero,endereco) values ('$cpf','$nome','$sexo','$salario','$departamento','$usuario','$senha','$tipo','$tel','$numero','$endereco')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas > 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                
                echo " Erro ao cadastrar!";
            
            }
	
?>