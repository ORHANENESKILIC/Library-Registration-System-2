<?php

    $db = new PDO("mysql:host=localhost;dbname=library_registration_system;charset=utf8", "root", "");

    $id = $_GET["id"];
    $newname = $_POST['NewBook'];
    $newauthor = $_POST['NewAuthor'];
    $newpublisher = $_POST['NewPublisher'];
    $newcategorie = $_POST['NewCategorie'];


    if (!$newname || !$newauthor || !$newpublisher || !$newcategorie) {
        die("");
    }

    $add = $db->prepare("UPDATE books SET book_name = ?, author = ?, publisher = ?, categorie = ? where id= ?");
    $add->execute([$newname, $newauthor, $newpublisher, $newcategorie, $id]);

    if ($add) {
        echo '<script>alert("transaction successful")</script>';
        header("refresh:0.1; url=../booklistpage.php");
    }else {
        echo "there was a mistake :( ";
    }

?>