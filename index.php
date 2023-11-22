<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $_SESSION['position']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="./assets/css/sukien.css">
    <link rel="stylesheet" href="./assets/css/styleOfTrieu.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.1.1-web/css/all.css">
    <script src="assets/NgayCuaToi.js"></script>
</head>

<body>  
    <!-- hearder -->
    <?php
        include('view/partials/header.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Aside (Menu) -->
            <?php
            include('view/partials/menu.php');
            ?>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Your content goes here -->
                <?php
                    include("router.php");
               ?>
            </main>
        </div>
    </div>
    <?php
    include('view/partials/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>