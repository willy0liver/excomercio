<?php

/*
PROBLEMA 01:
===========
Usando PHP, crear una clase llamada ChangeString ​que tenga un método llamado build
el cual tome un parámetro string que debe ser modificado por el siguiente algoritmo .
Reemplazar cada letra de la cadena con la letra siguiente en el alfabeto. Por ejemplo
reemplazar a​ por b​ ó c​ por d.​ Finalmente devolver la cadena.
Indicaciones
● Crear la solución en un solo archivo llamado ChangeString.php
● El método build devuelve la salida del algoritmo
● Considerar el siguiente abecedario : a, b, c, d, e, f, g, h, i, j, k, l, m, n, ñ, o, p, q, r, s, t, u, v, w, x, y, z.

Ejemplos
● entrada : "123 abcd*3" salida : "123 bcde*​ 3"
● entrada : "**Casa 52" salida : "**Dbtb​ 52"
● entrada : "**Casa 52Z" salida : "**Dbtb​ 52A​"
*/

// Clase Solicitada
class ChangeString {

  // Metodos Solicitado
   function build($entrada)
   {
       
      $salida = '';

      $letra1  = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ123456789';
      $letra2 = 'bcdefghijklmnñopqrstuvwxyzaBCDEFGHIJKLMNÑOPQRSTUVWXYZA234567890';

      $array = str_split($entrada);

      foreach ($array as $valor) {
          $pos = strpos($letra1, $valor);
          if($pos>0){
            $salida = $salida . substr($letra2, $pos, 1);
          }else{
            $salida = $salida . $valor;
          }
      }

      return $salida;
   }

} 

// PARA PROBAR EL CODIGO DIRECTAMENTE, DESCOMENTAR LAS 2 SIGUIENTES LINEAS
//$entra = '456* abc';
//echo ChangeString::build($entra); 

?>