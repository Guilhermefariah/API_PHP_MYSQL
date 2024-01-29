<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if($conn = mysqli_connect($server,$user,$pass,$bd)){
        //echo "Conectado!";
    }else 
       echo "[ERRO]";
    
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
            $texto
      </div>";
    }
?>