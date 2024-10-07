<?php
echo "<h1>Edit City</h1>";

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


?>

<form id="updateCity" name="updateCity" method="post" action="edit_city_complete.php">
<!--    need to pass along the id somehow-->
    <input type="hidden" name="id" value="<?php echo $cityID; ?>" />
    <p><label>City Name: <input type="text" name="Name" id="Name" value="<?php echo $city_name; ?>"/></label></p>
    <p><label>District: <input type="text" name="District" id="district" value="<?php echo $district; ?>" /></label></p>
    <p><label>Population: <input type="text" name="Population" id="Population" value="<?php echo $population; ?>" /></label></p>
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
                 $selected = '';
                 //pre-fil the country dropdown with "selected"
                 if ($row['Code'] == $country_code) {
                     echo '<option value="' . $row['Code'] . '" selected>' . $row['Name'] . '</option>';
                 } else {
                     echo '<option value="' . $row['Code'] . '">' . $row['Name'] . '</option>';
                 }
             }
             ?>
                    </select>
                </p>
                <p><input type="submit" id="submit" value="Submit" /></p>
            </form>

