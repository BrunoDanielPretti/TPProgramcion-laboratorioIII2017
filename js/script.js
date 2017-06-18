pNexo = "nexo.php/";

function Nexo(param, destino="#principal", metodo="GET"){
    pagina = pNexo+param;
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

function Refresh_Nav(){
    //$("#btnSesion").html("Sesion Iniciada");

    $.ajax({
        url: "partes/navMenus.php",
        method: "POST",        
        dataType: "text"
    }).done(function(dato){
        $("#nav-1").html(dato);
        Nexo("home");
    })
}