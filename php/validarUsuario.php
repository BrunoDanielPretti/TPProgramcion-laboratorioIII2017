<?php
    require_once "clases/Usuario.php";
    require_once "clases/AccesoDatos.php";
    session_start();
    $mail = $_POST["usuario"];
    $clave = $_POST["clave"];

    $resultado = Usuario::BuscarPorSesion($mail, $clave); 

    if($resultado != false){        
        //setcookie("mail",$mail,  time()+36000 , '/');
        $_SESSION["registrado"] = $mail;
        $_SESSION["tipo"] = $resultado;
        //$array = array("usuario" => $mail);
        //echo json_encode($array);
        
    }else{
        echo "error";
    }
    
?>