pNexo = "nexo.php/";

function Nexo(param, destino="#principal", metodo="GET"){
    pagina = pNexo+param; // "nexo.php/partes/menuSesion"
    $.ajax({
        url: pagina,
        type: metodo
    }).done(function(datos){
        $(destino).html(datos);
    })    
}

function NexoP(param, destino="#principal"){
    Nexo("partes/"+param, destino);
}

//-------------------------------------------------------------------
function Refresh_Nav(){
    //$("#btnSesion").html("Sesion Iniciada");

    $.ajax({
        url: "partes/navMenus.php",
        method: "POST",        
        dataType: "text"
    }).done(function(dato){
        $("#nav-1").html(dato);
        //NexoP("home");
    })
}


function Sesion_Aceptar(){
    
    var enviar = {usuario: $("#txtUsuario").val(), clave: $("#txtClave").val()}
    $.ajax({
        url: pNexo+"php/iniciarUsuario",
        //url: "php/validarUsuario.php",
        method: "POST",
        data: enviar        
                
    }).done(function(dato){
        if(dato == "error"){
            $("#frmTxtUsuario").addClass("has-error");
            $("#frmTxtClave").addClass("has-error");
            $("#spanTxtClave").removeClass("hidden");
        }
        else{
            localStorage.setItem("token", dato);
            NexoP("home");
            //Refresh_Nav();
        }
       
    })
}