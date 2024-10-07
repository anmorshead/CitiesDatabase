<?php
require_once('./dbConn.php');
$conn = getDBconnection();

$city_name = '';
$district = '';
$population = '';
$country = '';
$message = '';

if(!empty($_POST['Name']) && !empty($_POST['District']) && !empty($_POST['Population']) && !empty($_POST['country'])){
    $city_name = $_POST['Name'];
    $district = $_POST['District'];
    $population = $_POST['Population'];
    $country = $_POST['country'];

    $sql = "INSERT INTO city (Name, District, Population, CountryCode)";
    $sql .= " VALUES ('$city_name', '$district', '$population', '$country')";

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

<form id="updateCity" name="updateCity" method="post" action="">
    <p><label>City Name: <input type="text" name="Name" id="Name" value=""/></label></p>
    <p><label>District: <input type="text" name="District" id="district" value="" /></label></p>
    <p><label>Population: <input type="text" name="Population" id="Population" value="" /></label></p>
    <p><label>Country: </label>
        <select name="country" id="country">
            <option value="">Select a Country</option>
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
            </body>
            </html>
