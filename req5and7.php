<?php
require_once('isLoggedIn.php');
checkIfLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>REQ 5 & 7</title>
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
        <th>Additional Actions</th>
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

    //get the total number of records
    $totalRecordsResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM city");
    $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);

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
                <a href='delete_city.php?id=" . $row['ID'] . "'>
                    <button>Delete</button>
                </a>
                <a href='more_info.php?id=" . $row['ID'] . "'>
                    <button>More Info..</button>
                </a></td>";

        echo "</tr>";
    }
    ?>
</table>

<footer>
    <?php
    //only show the "Prev Page" button if page# is >1
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '"><button style="margin: 60px">Prev Page</button></a>';
    }

    //add "Next Page" button if not on the last page
    if ($page < $totalPages) {
        echo '<a href="?page=' . ($page + 1) . '"><button style="margin: 60px">Next Page</button></a>';
    }

    //add "Last Page" button for ease of use
    if ($page < $totalPages) {
        echo '<a href="?page=' . $totalPages . '"><button style="margin: 60px">Last Page</button></a>';
    }
    ?>
</footer>
<form name="LogoutForm" action="logOut.php" method="post">
    <input type="submit" name="logoutButton" value="Log Out" />
</form>
<?php
closeDbConnection($conn);
?>
<br>
<a href="req3.php"> Search City Database</a>
<br>
<a href="req4.php">Add a City to the Database</a>
</body>
</html>
