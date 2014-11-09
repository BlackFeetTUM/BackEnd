<?php
    $host_name  = "xxxxxxxxx";
    $database   = "xxxxxxx";
    $user_name  = "xxxxxxxx";
    $password   = "xxxxxxxxxxxxxxx";

    $connect = mysqli_connect($host_name, $user_name, $password, $database);

    if (mysqli_connect_errno())
    {
        echo "Verbindung zum MySQL Server fehlgeschlagen: " . mysqli_connect_error();
    }
?>