<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_registration_system";

try {
    $cnnt = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $cnnt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM books WHERE id='" . $_GET["id"] . "'";
    $cnnt->exec($sql);
    echo '<script>alert("transaction successful...")</script>';
    header("refresh:1; url=../booklistpage.php");
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$cnnt = null;
?>