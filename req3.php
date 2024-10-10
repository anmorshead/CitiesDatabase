<?php
 require_once('isLoggedIn.php');
checkIfLoggedIn();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>REQ3</title>
</head>
<body>

<?php
require_once("./dbconn.php");
$conn = getDbConnection();

$searchTerm = '';
if(!empty($_POST['search'])) {

    $searchTerm = $_POST['search'];

    $sql = "SELECT city.ID,city.Name,city.District,city.Population,country.name as country";
    $sql .= " FROM city INNER JOIN country";
    $sql .= " ON country.Code=city.CountryCode";
    $sql .= " WHERE city.Name LIKE '%".$searchTerm."%'";
    $sql .= " OR city.District LIKE '%".$searchTerm."%'";
    $sql .= " ORDER BY city.Name ASC";
    $sql .= " LIMIT 0,25";


    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }
    echo "
                <table>
                        <thead>
                            <th>City Id</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Population</th>
                            <th>Country</th>
                        </thead>
                            <tbody>";


    while ($row = mysqli_fetch_assoc($result)) {
        echo "
                               <tr>
                                <td>{$row['ID']}</td>
                                <td>{$row['Name']}</td>
                                <td>{$row['District']}</td>
                                <td>{$row['Population']}</td>
                                <td>{$row['country']}</td>
                               </tr>";
    }
}
closeDbConnection($conn);
?>
    </tbody>
    </table>

<!--form to get the search term-->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p>Search: <input type="text" name="search" /></p>
            <p><input type="submit" name="Submit" value="Submit" /></p>
        </form>

        <style>
            table, th, tr, td { border: solid 2px black;}
        </style>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>

</body>
</html>