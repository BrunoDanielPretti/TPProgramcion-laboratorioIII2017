<?php
    function MANEJO_NAV_MENU($pTipo){    
        //$pUsuario = $_POST["usuario"];
        if($pTipo == "e")
        {return
         ?>
            <ul class="nav navbar-nav">
                <li><a href="#" onclick="entrada()">Entrada</a></li>
                <li><a href="#" onclick="salida()">Salida</a></li>                                        
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
                <li><a href="#" onclick="NexoP('menuSesion')" class="navbar-brand" id="">Sesion Iniciada</a></li>
            </ul>
        <?php
        ;}
        elseif($pTipo == 'a')
        {return ?>
            <ul class="nav navbar-nav">
                <li><a href="#" onclick="entrada()">Entrada</a></li>
                <li><a href="#" onclick="salida()">Salida</a></li>  
                <li><a href="#" onclick="administrar()">Administrar</a></li>                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
                <li><a href="#" onclick="NexoP('menuAdmin')" class="navbar-brand" id=""><?php echo $_SESSION["registrado"] ?></a></li>
            </ul>
        <?php
        ;}
        elseif($pTipo == "cerrar")
        {return ?>        
            <ul class="nav navbar-nav navbar-right">
                <!--<li role="presentation" class="btn btn-danger btn-lg" onclick="btnSesion()" >Iniciar Sesion</li>                    -->
                <li><a href="#" onclick="NexoP('menuSesion')" class="navbar-brand" id="">Iniciar Sesion</a></li>
            </ul>
        <?php
        ;}
    }  


?>
 