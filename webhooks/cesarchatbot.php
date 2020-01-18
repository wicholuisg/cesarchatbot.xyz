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
    $respuesta4 = obtener_variables()['respuesta4'];
    $respuesta5 = obtener_variables()['respuesta5'];
    $respuesta6 = obtener_variables()['respuesta6'];
    $respuesta7 = obtener_variables()['respuesta7'];
    $respuesta8 = obtener_variables()['respuesta8'];
    $respuesta9 = obtener_variables()['respuesta9'];
    $respuesta10 = obtener_variables()['respuesta10'];
    /*QUERY DE CONSULTA SQL
      //$respuesta1 = $mydb->query("SELECT * FROM `preguntas` WHERE 1");
      //$respuesta = mysqli_fetch_assoc($respuesta1);
      //$pregunta1 = $respuesta['pregunta1'];
    */

    $array_usuario = array($respuesta1,$respuesta2,$respuesta3);
    $array_v = array("B","A","B","C","C","B","A","B","A","C");
    //$array1 = array("B","A","B","C","C","B","A","B","A","C","B","B","C","A","B","A","C","C","A","A","B","C","A","B","A","C","B","C","B","C","B","C","A","B","B","A","A","B","B","C");
    $array_a = array("A","C","A","B","B","A","B","A","C","B");
    //$array2 = array("A","C","A","B","B","A","B","A","C","B","A","C","A","B","A","C","B","A","B","C","C","A","B","A","B","B","A","B","C","B","A","A","C","A","C","C","B","C","C","A");
    $array_k = array("C","B","C","A","A","C","C","C","B","A");
    //$array3 = array("C","B","C","A","A","C","C","C","B","A","C","A","B","C","C","B","A","B","C","B","A","B","C","C","C","A","C","A","A","A","C","B","B","C","A","B","C","A","A","B");

    $cont_v = 0;
    $cont_a = 0;
    $cont_k = 0;

    while($array_u = current($array_usuario)){
      if($array_u == current($array_v)){
        $cont_v++;
      }
      elseif($array_u == current($array_a)){
        $cont_a++;
      }
      elseif($array_u == current($array_k)){
        $cont_k++;
      }
      next($array_usuario);
      next($array_v);
      next($array_a);
      next($array_k);
    }

    if($cont_v > $cont_a && $cont_v > $cont_k){
      $clasif = "<strong>VISUAL</strong>";
      enviar_texto("Tu estilo de aprendizaje es $clasif");
    }
    elseif($cont_a > $cont_v && $cont_a >$cont_k){
      $clasif = "<strong>AUDITIVO</strong>";
      enviar_texto("Tu estilo de aprendizaje es $clasif");
    }
    elseif($cont_k > $cont_v && $cont_k > $cont_a){
      $clasif = "<strong>QUINESTÉSICO</strong>";
      enviar_texto("Tu estilo de aprendizaje es $clasif");
    }
    else{
      $clasif = "<strong>TODOS</strong>";
      enviar_texto("Tu estilo de aprendizaje son TODOS");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    $resultado = $mydb->query("INSERT INTO `respuestas`(`clasif`,`pregunta1`,`pregunta2`,`pregunta3`,`pregunta4`,`pregunta5`,
                                                        `pregunta6`,`pregunta7`,`pregunta8`,`pregunta9`,`pregunta10`)
                              VALUES('".$clasif."','".$respuesta1."','".$respuesta2."','".$respuesta3."','".$respuesta4."',
                                      '".$respuesta5."','".$respuesta6."','".$respuesta7."','".$respuesta8."','".$respuesta9."',
                                      '".$respuesta10."')");

    /*Script para contar mayor número de incisos y generar una respuesta con esto.//
    $vector_respuestas = array($respuesta1,$respuesta2,$respuesta3);
    $inciso_a = count(array_keys($vector_respuestas, "a"));
    $inciso_b = count(array_keys($vector_respuestas, "b"));
    $inciso_c = count(array_keys($vector_respuestas, "c"));
    *///////////////////////////////////////////////////////////////////////////////
  }

?>
