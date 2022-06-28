<?php
$mysql = "localhost";
$mysqluser = "root";
$mysqlpass = "";
try {
    $conn = new PDO("mysql:host=$mysql;dbname=library_registration_system;charset=utf8", $mysqluser, $mysqlpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected"; 
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
?>
<?php
include("Back-End/db.php");

$query=$db->prepare('select * from books');
$query->execute();
$booklist=$query-> fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Library Registration System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">Library Registration System</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">WELCOME</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Library Registration System</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        
    <div class="container">
<table class="table">
  <tr>
    <th>Number</th>
    <th>Book Name</th>
    <th>Author Name</th>
    <th>Publisher Name</th>
    <th>categorie</th>                 
    <th>Progress</th>
  </tr>
  <?php 
  foreach($booklist as $book){?>
			  
			<tr>
        <td><?= $book->id ?></td>
			  <td><?= $book->book_name ?></td>
			  <td><?= $book->author ?></td>
			  <td><?= $book->publisher ?></td>
              <td><?= $book->categorie ?></td>
        
              <td>
                <a href="Back-End/book_delete.php?id=<?php echo $book->id; ?>" ><button style="background:#ff0000" >Delete</button></a>
                <a href="bookupdatepage.php?id=<?php echo $book->id; ?>"> <button style="background:#00c44e">Update</button></a> 
              </td>
<?php } ?>
</table>
                             
            </div>
                       
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Library Registration System </small></div>
        </div>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
