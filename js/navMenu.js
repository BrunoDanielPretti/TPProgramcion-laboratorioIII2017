function entrada(){
   $("#principal").html("Boton de Entrada");
}

function salida(){   
    $("#principal").html("Boton de salida");
}

function aEstacionamiento(){
   $.ajax({
        url: "partes/estacionamiento.php",
        method: "POST",
        dataType: "text"
    }).done(function(data){
        $("#principal").html(data);
    })
}

// function btnSesion(){
//     $.ajax({
//         url: "partes/menuSesion.php",
//         method: "POST",
//         dataType: "text"
//     }).done(function(data){
//         $("#principal").html(data);
//     })
//     //$("#principal").html("Boton de Sesion");
// }

function btnEst(){
    $("#btn-est-200").css({"color": "red"});
}