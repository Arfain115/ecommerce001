<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header('Location: ../login.php');
    exit();
}


?>

<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from products where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Deleted Succesfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
