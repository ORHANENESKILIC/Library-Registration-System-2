<?php
error_reporting(0);
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

$id=$_GET["id"];
$query=$db->prepare('select * from books where id= ?');
$query->execute([$id]);
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
            
                <h1 class="masthead-heading text-uppercase mb-0">UPDATE PAGE</h1>
        
                <p class="masthead-subheading font-weight-light mb-0">Library Registration System</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        
    <div class="container">
            <?php
            foreach($booklist as $book){?>
            <form action='Back-End/book_update.php?id=<?php echo $id ?>' method="POST">
            <div class="mb-3">
                <label for="Book" class="form-label">Book Name</label>
                <input type="text" placeholder="Book name.." value="<?php echo $book->book_name; ?>" class="form-control" name="NewBook" id="NewBook">
            </div>
            <div class="mb-3">
                <label for="Author" class="form-label">Author Name</label>
                <input type="text" placeholder="Author Name..." value="<?php echo $book->author; ?>" class="form-control" name="NewAuthor" id="NewAuthor">
            </div>
            <div class="mb-3">
                <label for="Publisher" class="form-label">Publisher Name</label>
                <input type="text" placeholder="Publisher Name..." value="<?php echo $book->publisher; ?>" class="form-control" name="NewPublisher" id="NewPublisher">
            </div>
            <label for="categorie">categories</label>
            <div class="mb-3">
                        <select id="categorie" name="NewCategorie">
                        <option value="select"><?php echo $book->categorie;?></option>
                            <option value="Autobiography">Autobiography</option>
                            <option value="Biography">Biography</option>
                            <option value="Health and Wellness">Health and Wellness</option>
                            <option value="Documentary ">Documentary </option>
                            <option value="Philosophy ">Philosophy </option>
                            <option value="History">History</option>
                            <option value=" Self-Help"> Self-Help</option>
                            <option value="Crime">Crime</option>
                            <option value="Drama">Drama</option>
                        </select>
            </div>
            
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>   
        <?php } ?>                
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

     