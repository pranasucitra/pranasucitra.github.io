<?php
// LOCAL
if ($_SERVER['HTTP_HOST'] == "localhost") {
    // CONNECTION WAREHOUSE
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "dealopa";

} else {
    // CONNECTION WAREHOUSE
    $server = "localhost";
    $username = "u1738422_admin_db";
    $password = "";
    $db = "";
}

$connect = new mysqli($server, $username, $password, $db);

if (!$connect) {
    die("Warehouse Not Connected :" . mysqli_connect_error());
}
