<?php

/*
PROBLEMA 02:
===========
Usando PHP, crear una clase llamada CompleteRange ​que tenga un método
llamado build ​el cual tome un parámetro de colección de números enteros
positivos (1,2,3, ...n). El algoritmo debe completar si faltan números en la
colección en el rango dado. Finalmente devolver la colección completa.
Indicaciones
● Crear la solución en un solo archivo llamado CompleteRange​.php
● El método build devuelve la salida del algoritmo
● Considerar el parámetro de colecciones con números enteros positivos
ordenados de manera ascendente. Ejemplo [4, 6, 7 ,10]
Ejemplos
● entrada : [1, 2, 4, 5] salida : [1, 2, 3​, 4, 5]
● entrada : [2, 4, 9] salida : [2, 3​,​ 4, 5, 6, 7, 8​, 9]
● entrada : [55, 58, 60] salida : [55, 56, 57, ​58, 59,​ 60]
*/

// Clase Solicitada
class CompleteRange {

  // Metodos Solicitado
   function build($entrada)
   {
       $salida=array();
       $m=9999999999;
       $M=0;
      
      foreach ($entrada as $valor) {
          if($valor < $m){
            $m = $valor;
          }

          if($valor > $M){
            $M = $valor;
          }
      }
      
      for ($i = $m; $i <= $M; $i++) {
          array_push($salida, $i);
      }

      return print_r ($salida);
   }

} 

// PARA PROBAR EL CODIGO DIRECTAMENTE, DESCOMENTAR LAS 2 SIGUIENTES LINEAS
//$entra = [12, 13,25];
//CompleteRange::build($entra); 

?>