<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>REQ 5</title>
</head>
<body>
<h1>Cities of the World</h1>
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

    //for pagination
    if(isset($_GET['page'])){
        //get the page from query
        $page = $_GET['page'];
    }else{
        //default to page 1
        $page = 1;
    }
    $recordsPerPage = 25;
    //offset = starting point for limit
    $offset = ($page - 1) * $recordsPerPage;

    $sql = "SELECT city.ID,city.Name,city.District,city.Population,city.CountryCode,country.name as country";
    $sql .= " FROM city INNER JOIN country";
    $sql .= " ON country.Code=city.CountryCode";
    $sql .= " ORDER BY city.ID ASC";
    $sql .= " LIMIT $offset, $recordsPerPage;";

    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        die('Could not retrieve records from the Database: ' . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>". $row['Name'] . "</td>";
        echo "<td>". $row['District'] . "</td>";
        echo "<td>". $row['Population'] . "</td>";
        echo "<td>". $row['country'] . "</td>";
        //keep hidden for later:
        echo "<td style='display: none;'>". $row['CountryCode'] . "</td>";
        echo "<td><a href='edit_city.php?id=" . $row['ID'] . "'>
                    <button>Edit</button>
                </a>
                <button>Delete</button></td>";
        echo "</tr>";
    }
    ?>
</table>

<footer>
    <?php
    //only show prev page button if page# is >1
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '"><button style="margin: 60px">Prev Page</button></a>';
    };
    //increase page# by 1 each time you hit next
    echo '<a href="?page=' . ($page + 1) . '"><button style="margin: 60px">Next Page</button></a>';
    ?>
</footer>
<?php
closeDbConnection($conn);
?>
</body>
</html>
