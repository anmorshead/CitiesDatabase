<?php
function getDbConnection()
{
    $conn = mysqli_connect("database", "root", "inet2005", "world");
    if(!$conn)
    {
        die("Unable to connect to database: " . mysqli_connect_error());
    }

    return $conn;
}

function closeDbConnection($conn){
    mysqli_close($conn);
}