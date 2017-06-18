
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