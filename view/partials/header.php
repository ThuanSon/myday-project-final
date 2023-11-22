<header class="container-fluid header-web">
        <div class="row header-web">
            <!-- Left Section -->
            <div class="col-xs-12 d-md-block sidebar">
                <!-- Icon -->
                
                <!-- Banner -->
                
            </div>
            <!-- Right Section -->
            <div class="row">
            <div class="banner col-xs-12 col-md-6 col-lg-3">
                    <!-- <label>Pheonix</label> -->
                    <div >
                    <!-- Logo -->
                    <img src="img/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </div>
            </div>
            <div class="col-md-6 col-lg-9">
                <div class="d-flex justify-content-end align-items-center">

                    <div>
                        <button class="btn"><i class="bi bi-search"></i></button>
                    </div>
                    <div>
                        <button class="btn"><i class="bi bi-bell"></i></button>
                    </div>
                    <div class="text-end">
            <div class="btn-group">
                <button class="btn"><i class="bi bi-person-circle"></i></button>
                <button class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                    <!-- <li><a class="dropdown-item" href="#">Người dùng</a></li> -->
                    <?php
                    // if ($_SESSION['login']==true) {
                        // if ($_SESSION['login']==true) {
                        //     echo '<li><a class="dropdown-item" href="index.php?logout">Đăng xuất</a></li>';
                        // }else{
                        //     echo '<li><a class="dropdown-item" href="index.php?login">Đăng nhap</a></li>';
                        // }
                        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                            echo '<li><a class="dropdown-item" href="index.php?logout">Đăng xuất</a></li>';
                        }else {
                            echo '<li><a class="dropdown-item" href="index.php?login">Đăng nhập</a></li>';
                        }
                    // }
                    ?>
                    
                </ul>
            </div>
            </div>

        </div>
    </header>