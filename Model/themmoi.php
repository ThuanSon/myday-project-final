<?php
 session_start();
 $currentUserName = $_SESSION['nguoidung'];
 if (!isset($_SESSION['nguoidung'])){
     echo "<script>window.location.href = '../DangNhap_DangKy/login.php';</script>";
 
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code
    $servername = "localhost";
    $database = "mydayhandbook";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    // Get form data
    $title = $_POST['title'];
    $start = $_POST['start'];

    // Insert data into the database
    $sql = "INSERT INTO sukien (TenSK, ThoiGian,Username) VALUES ('$title', '$start','$currentUserName')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = '../../index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
mysqli_close($conn);

}
?>