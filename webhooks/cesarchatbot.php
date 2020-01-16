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

  if(intent_recibido("Pregunta4Respuesta3")){
    $respuesta1 = obtener_variables()['respuesta1'];
    $respuesta2 = obtener_variables()['respuesta2'];
    $respuesta3 = obtener_variables()['respuesta3'];
    /*QUERY DE CONSULTA SQL
      //$respuesta1 = $mydb->query("SELECT * FROM `preguntas` WHERE 1");
      //$respuesta = mysqli_fetch_assoc($respuesta1);
      //$pregunta1 = $respuesta['pregunta1'];
    */

    /*Script para contar mayor número de incisos y generar una respuesta con esto.//
    $vector_respuestas = array($respuesta1,$respuesta2,$respuesta3);
    $inciso_a = count(array_keys($vector_respuestas, "a"));
    $inciso_b = count(array_keys($vector_respuestas, "b"));
    $inciso_c = count(array_keys($vector_respuestas, "c"));

    if($inciso_a > $inciso_b && $inciso_a > $inciso_c){
      enviar_texto("Tu estilo es visual");
    }
    elseif($inciso_b > $inciso_a && $inciso_b > $inciso_a){
      enviar_texto("Tu estilo es auditivo");
    }
    elseif($inciso_c > $inciso_a && $inciso_c > $inciso_b){
      enviar_texto("Tu estilo es quinestésico");
    }
    else{
      enviar_texto("Tu tienes todos los estilos");
    }
    *///////////////////////////////////////////////////////////////////////////////

    $resultado = $mydb->query("INSERT INTO `preguntas`(`pregunta1`,`pregunta2`,`pregunta3`)
                              VALUES('".$respuesta1."','".$respuesta2."','".$respuesta3."')");

    enviar_texto("Pregunta 1: $respuesta1, Pregunta 2: $respuesta2, Pregunta 3: $respuesta3");
  }

?>