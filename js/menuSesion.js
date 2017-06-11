function sesionAceptar(parametro){
    $("#btnSesion").html("Sesion Iniciada");

    $.ajax({
        url: "partes/navMenus.php",
        method: "POST",
        data: {qh: parametro},
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