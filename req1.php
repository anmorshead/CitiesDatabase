<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>REQ 1</title>
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
        <th>Country Name</th>
    </tr>


<?php
require_once('./dbConn.php');
$conn = getDBconnection();

$sql = "SELECT city.ID,city.Name,city.District,city.Population,country.name as country";
$sql .= " FROM city INNER JOIN country";
$sql .= " ON country.Code=city.CountryCode";
$sql .= " ORDER BY city.ID ASC";
$sql .= " LIMIT 0,25;";

$result = mysqli_query($conn,$sql);
if(!$result)
{
    die('Could not retrieve records from the World Database: ' . mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>". $row['Name'] . "</td>";
    echo "<td>". $row['District'] . "</td>";
    echo "<td>". $row['Population'] . "</td>";
    echo "<td>". $row['country'] . "</td>";
    echo "</tr>";
}

closeDbConnection($conn);
?>