<?php
/////ENCABEZADO/////
  include_once "../library/dialogflow_library.php";
  credenciales('cesarchatbot','ChatbotTesina7');
  debug();

  //Conectando a DB
  $mydb = mysqli_connect("localhost","u935747479_cesarchatbot","ChatbotTesina7","u935747479_cesarchatbotdb");
  if(!$mydb){
    echo "ERROR: No se puede conectar a la Base de Datos" . PHP_EOL;
    die();
  }
////////////////////

  if(intent_recibido("Pregunta2")){
    $respuesta1 = obtener_variables()['respuesta1'];
    /*QUERY DE CONSULTA
      //$respuesta1 = $mydb->query("SELECT * FROM `preguntas` WHERE 1");
      //$respuesta = mysqli_fetch_assoc($respuesta1);
      //$pregunta1 = $respuesta['pregunta1'];
    */

    $resultado = $mydb->query("INSERT INTO `preguntas`(`pregunta1`) VALUES('".$respuesta1."')");

    enviar_texto("La respuesta recibida de la pregunta 1 es $pregunta1");
  }

?>
