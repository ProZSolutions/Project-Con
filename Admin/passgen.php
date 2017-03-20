<?php // WARNING: THIS CODE IS INSECURE. DO NOT USE THIS CODE.
 $password = "";
 $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 
 for($i = 0; $i < 8; $i++)
 {
      $random_int = mt_rand();
      $password .= $charset[$random_int % strlen($charset)];
 }
 
 echo $password, "\n";
 ?>