<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'php/clases/AutentificadorJWT.php';
require 'php/clases/AccesoDatos.php';
require 'php/clases/Usuario.php';

//\slim\Slim::registerAutoloader();
//$app = new \Slim\App();

$config['displayErrorDetails'] = false;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);


$app->get('/', function(){
    echo "hola world, por GET";
});
//---------------------------------  Partes  --------------------------------------------------//

$app->get('/partes/{pParte}', function(Request $request, Response $response, $args){
    $p = $args['pParte'];
    include("partes/$p.php");
});


//---------------------------------  TOKENS  --------------------------------------------------//

$app->get('/getNewToken', function(){
    $datos = array('juan' => 'rogelio','apellido' => 'peres', 'edad' => 33);    
    $token = AutentificadorJWT::CrearToken($datos);

    //var_dump($token);
    echo $token;
});

$app->get('/ValidarToken', function (Request $request, Response $response) {        
    //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJQVQiOjE0OTc1Nzk2OTcsIkVYUCI6MTQ5NzU3OTc1NywiREFUQSI6eyJqdWFuIjoicm9nZWxpbyIsImFwZWxsaWRvIjoicGVyZXMiLCJlZGFkIjozM30sIkFQUCI6ImFwaXJlc3QgSldUIn0.qZ4qjHJKHouScHhUDyt_uS7KX7aJSS2HszW2smM8nfY";
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJJQVQiOjE0OTc3MzU3ODUsIkVYUCI6MTQ5NzczNTg0NSwiREFUQSI6eyJqdWFuIjoicm9nZWxpbyIsImFwZWxsaWRvIjoicGVyZXMiLCJlZGFkIjozM30sIkFQUCI6ImFwaXJlc3QgSldUIn0.VV9zLG3Gnxu3XemwXWyuHfL-Bt87ZeH0GNldcgTveFs";
    try{
        AutentificadorJWT::VirificarToken($token);
        return "valido";
    }
    catch(Exception  $e){
        return $e->getMessage();
    }
    
    
    //$newResponse = $response->withJson($decod, 200);     
    //return $newResponse;
    //AutentificadorJWT::VirificarToken($token);
    //var_dump($decod);
});

//-------------------------------------- USUARIO --------------------------------------------------------//

$app->post('/php/iniciarUsuario', function(Request $request, Response $response){
    $usuario = $request->getParam("usuario");
    $clave = $request->getParam("clave");

    $resultado = Usuario::BuscarPorSesion($usuario, $clave);      
    
    if($resultado != false){        
        $datos= array('usuario' => $usuario, 'clave' => $clave, 'tipo' => $resultado);
        $token = AutentificadorJWT::CrearToken($datos);                      
    }else{
        echo "error";
    }            
});

$app->run();
?>
