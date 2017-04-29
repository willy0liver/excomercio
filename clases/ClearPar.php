<?php

/*
PROBLEMA 03:
===========
Usando PHP, crear una clase llamada ClearPar ​que tenga un método llamado
build ​que reciba como parámetro una cadena formada sólo por paréntesis
(()()()()(()))))())((()​). El algoritmo debe eliminar todos los paréntesis que no tienen
pareja.Finalmente devolver la nueva cadena.
Indicaciones
● Crear la solución en un solo archivo llamado ClearPar.php
● El método build devuelve la salida del algoritmo
● Considerar solamente cadenas formadas de paréntesis
Ejemplos
● entrada : "()())()" salida : "()()()"
● entrada : "()(()" salida : "()()"
● entrada : ")(" salida : ""
● entrada : "((()" salida : "()"
*/

// Clase Solicitada
class ClearPar {

  // Metodos Solicitado
   function build($entrada)
   {
       $salida='';
       $ini = '(';
       $fin = ')';
       $banderaIni = true;

       $arr1 = str_split($entrada);

       foreach ($arr1 as $valor) {
        
          if($banderaIni){
            if($valor == $ini){
              $salida = $salida . $ini;
              $banderaIni = false;
            }
          }else{
            if($valor == $fin){
              $salida = $salida . $fin;
              $banderaIni = true;
            }
          }
      }

      // Si el parentesis no ha cerrado, borramos la apertura
      if(!$banderaIni){
        $salida = substr($salida, 0, -1);
      }

       return $salida;
   }

} 

// PARA PROBAR EL CODIGO DIRECTAMENTE, DESCOMENTAR LAS 2 SIGUIENTES LINEAS
//$entra = '((()';
//echo ClearPar::build($entra); 

?>