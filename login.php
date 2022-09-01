<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">

<?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
        //Username ist frei
        $row = $stmt->fetch();
        if(password_verify($_POST["pw"], $row["PASSWORD"])){
          session_start();
          $_SESSION["username"] = $row["USERNAME"];
          header("Location: home.php");
        } else {
          echo "Der Login ist fehlgeschlagen";
        }    
      } else {
        echo "Der Login ist fehlgeschlagen";
      }
    }
     ?>

     <a href="index.php">Gehe zurück zur Anmeldung</a>