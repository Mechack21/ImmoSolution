<?php

    class Connexion{
        
      public static function getPreparedStatement($req){
         $chemin = "mysql:host=localhost; dbname=agenceimmobd";
         $user = "root";
         $password = "";
         $resReq="";
         try {
             $prstmt = new PDO($chemin, $user, $password);
             $resReq = $prstmt->prepare($req);
             $prstmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo 'Connection reussi <br><br>';
         } catch (PDOException $ex) {
             echo 'Connection echouer'.$ex->getMessage();
         }
         
         return $resReq;
      }
   
    }

?>