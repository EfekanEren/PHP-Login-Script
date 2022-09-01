<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset=utf-8>
        <title>Home</title>
       
    Hallo <?php echo $_SESSION["username"] ?>

</head>
<body>
    <h1>Geschützter Bereich</h1>
    <a href="logout.php">Abmelden</a>
</body>
</html>