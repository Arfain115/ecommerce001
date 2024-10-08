<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

if(!$conn){
    echo "Connection to the database failed";
}
?>