<?php
    session_start();
    //$pUsuario = $_POST["usuario"];
    if($_SESSION["tipo"] == "empleado")
    {?>
        <ul class="nav navbar-nav">
            <li><a href="#" onclick="entrada()">Entrada</a></li>
            <li><a href="#" onclick="salida()">Salida</a></li>                                        
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
            <li><a href="#" onclick="btnSesion()" class="navbar-brand" id="">Sesion Iniciada</a></li>
        </ul>
    <?php
    }
    elseif($_SESSION["tipo"] == 'a')
    {
    ?>
        <ul class="nav navbar-nav">
            <li><a href="#" onclick="entrada()">Entrada</a></li>
            <li><a href="#" onclick="salida()">Salida</a></li>  
            <li><a href="#" onclick="administrar()">Administrar</a></li>                                              
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
            <li><a href="#" onclick="btnSesion()" class="navbar-brand" id=""><?php echo $_SESSION["registrado"] ?></a></li>
        </ul>
    <?php
    }
    elseif($_SESSION["tipo"] == "cerrar")
    {
    ?>        
        <ul class="nav navbar-nav navbar-right">
            <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
            <li><a href="#" onclick="btnSesion()" class="navbar-brand" id="">Iniciar Sesion</a></li>
        </ul>
    <?php
    }
?>
