<?php
     session_start();
	include_once "conexao.php";
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
   


    if(empty($usuario) || empty($senha)){
        echo "ok";
    }else{
        $sql = "SELECT * FROM funcionario WHERE usuario = '$usuario' and senha = '$senha' and tipo ='administrador'";
        $res=mysqli_query($con, $sql);
        $row = mysqli_num_rows($res);
        if($row>0){
            $_SESSION['usuario']=$_POST['usuario'];
            $_SESSION['senha']=$_POST['senha'];
            header("Location:../home.php");
        }else{
            $sql = "SELECT * FROM funcionario WHERE usuario = '$usuario' and senha = '$senha' and tipo ='comun'";
            $res=mysqli_query($con, $sql);
            $row = mysqli_num_rows($res);
            if($row>0){
                $_SESSION['usuario']=$_POST['usuario'];
                $_SESSION['senha']=$_POST['senha'];
                header("Location:../Paginas/Bilheteria/Home.php");
            }else{
                echo "erro";
            }
            }
            /*exemplo*/
            /*$loop = 2;
            $tipo = "administrador";
            $caminho = "../home.php";
            while($loop==2){
                $sql = "SELECT * FROM funcionario WHERE usuario = '$usuario' and senha = '$senha' and tipo ='$tipo'";
                $res=mysqli_query($con, $sql);
                $row = mysqli_num_rows($res);
                if($row>0){
                    $_SESSION['usuario']=$_POST['usuario'];
                    $_SESSION['senha']=$_POST['senha'];
                    header("Location:".$caminho);
                }else{
                    $caminho = "../Paginas/Bilheteria/Home.php";
                    $tipo = "comum";
                    $loop = $loop - 1;
                }
            }*/
    }
?>