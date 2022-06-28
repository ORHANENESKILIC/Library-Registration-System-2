<?php

$db = new PDO("mysql:host=localhost;dbname=library_registration_system;charset=utf8", "root", "");


$name = $_POST['Book'];
$author = $_POST['Author'];
$publisher = $_POST['Publisher'];
$categorie = $_POST['categorie'];



if (!$name || !$author || !$publisher || !$categorie) {
    die("there are empty fields !.");
}

$add = $db->prepare("INSERT INTO books SET book_name = ?, author = ?, publisher = ?, categorie = ?");
$add->execute([$name, $author, $publisher, $categorie]);

if ($add) {
    echo '<script>alert("transaction successful")</script>';
    header("refresh:1; url=../bookregistrationpage.php");
}else {
    echo "there was a mistake :( ";
}

?>