<?php
require_once('isLoggedIn.php');
checkIfLoggedIn();

require_once('./dbConn.php');
$conn = getDBconnection();

$city_name = '';
$district = '';
$population = '';
$message = '';

if(!empty($_POST['Name']) && !empty($_POST['District']) && !empty($_POST['Population']) && !empty($_POST['country'])){
    $city_name = $_POST['Name'];
    $district = $_POST['District'];
    $population = $_POST['Population'];
    $country_code = $_POST['country'];

    $sql = "INSERT INTO city (Name, District, Population, CountryCode)";
    $sql .= " VALUES ('$city_name', '$district', '$population', '$country_code')";


    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error inserting data: " . mysqli_error($conn));
    } else {
        $addedRows = mysqli_affected_rows($conn);
        $message =  "$addedRows record(s) were added successfully!";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add a City</title>
</head>
<body>
<h1>Add a city to our database!</h1>
<script src="validation.js" type="text/javascript"></script>
<form id="updateCity" name="updateCity" method="post" action="" onsubmit="return checkForm()">
    <p><label>City Name: <input type="text" name="Name" id="Name" value=""/></label></p><span id="nameWarning"></span>
    <p><label>District: <input type="text" name="District" id="district" value="" /></label></p><span id="districtWarning"></span>
    <p><label>Population: <input type="text" name="Population" id="Population" value="" /></label></p><span id="populationWarning"></span>
    <p><label>Country: </label><span id="countryWarning"></span>
        <select name="country" id="country"></p>
            <option value="" >Select a Country</option>
             <?php

             // get all countries from the database
             $sql = "SELECT Code, Name FROM country ORDER BY Name ASC";
             $result = mysqli_query($conn, $sql);

             if (!$result) {
                 die('Could not retrieve countries: ' . mysqli_error($conn));
             }

             // loop through each country to get options
             while ($row = mysqli_fetch_assoc($result)) {
                 echo '<option value="' . $row['Code'] . '">' . $row['Name'] . '</option>';
             }
             ?>
                    </select>
                </p>
                <p><input type="submit" id="submit" value="Add City" /></p>
            </form>
            <p><?php echo $message; ?></p>

            <br><br>

            <form name="LogoutForm" action="logOut.php" method="post">
                <input type="submit" name="logoutButton" value="Log Out" />
            </form>
            <br>
            <a href="req5and7.php">Back</a>
            </body>
            </html>
