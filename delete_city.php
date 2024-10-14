<?php
require_once('isLoggedIn.php');
checkIfLoggedIn();

echo "<h1>Delete City</h1>";

require_once "dbConn.php";
$conn = getDbConnection();

$cityID = $_GET['id'];

//gets the info of the city with matching id
$sql = "SELECT city.ID,city.Name,city.District,city.Population,city.CountryCode, country.name as country";
$sql .= " FROM city INNER JOIN country";
$sql .= " ON country.Code=city.CountryCode";
$sql .= " WHERE city.ID=$cityID";

$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $city_name = $row['Name'];
    $district = $row['District'];
    $population = $row['Population'];
    $country = $row['country'];
    $country_code = $row['CountryCode'];
} else {
    die("City not found.");
}

// delete sql statement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete_sql = "DELETE FROM city WHERE ID = $cityID";
    $result = mysqli_query($conn, $delete_sql);
    if (!$result) {
        die("Error deleting data " . mysqli_error($conn));
    } else {
        echo "Successfully deleted" . mysqli_affected_rows($conn) . " record(s).";
        ?>
        <br>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>
        <br>
        <a href="req5and7.php">Back</a>
        <?php
        //need to exit so it will stop asking!
        exit;
    }
}
closeDbConnection($conn);
?>

<h1>Are you sure you wish to delete record <?php echo "$cityID: $city_name"?> ?</h1>
<form method="post" action="">
<!--    hidden input to send id-->
    <input type="hidden" name="id" value="<?php echo $cityID; ?>">
    <input type = submit value="Yes" id="Yes">
    <a href='req5and7.php'>
    <button type="button">No</button>
    </a>
</form>


