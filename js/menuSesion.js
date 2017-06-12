function Refresh_Nav(){
    $("#btnSesion").html("Sesion Iniciada");

    $.ajax({
        url: "partes/navMenus.php",
        method: "POST",        
        dataType: "text"
    }).done(function(dato){
        $("#nav-1").html(dato);
    })
}

function sesionCancelar(){
    $("#btnSesion").html("Iniciar Sesion");
}

function sesionAdmin(){
    $("#btnSesion").html("Administrador");
}

function Sesion_Aceptar(){
    var enviar = {usuario: $("#txtUsuario").val(), clave: $("#txtClave").val()}
    $.ajax({
        url: "php/validarUsuario.php",
        method: "POST",
        data: enviar        
                
    }).done(function(dato){
        if(dato == "error"){
            $("#frmTxtUsuario").addClass("has-error");
            $("#frmTxtClave").addClass("has-error");
            $("#spanTxtClave").removeClass("hidden");
        }
        else{
             Refresh_Nav();
        }
       
    })
}