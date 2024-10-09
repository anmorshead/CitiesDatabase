<?php
require_once('./dbConn.php');
$conn = getDBconnection();

$cityID = $_GET['id'];

//get cityName, country, country code, languages spoken in country, Continent
$sql = "SELECT city.ID, city.Name, city.District, city.Population, city.CountryCode, country.Continent, country.name as country, countrylanguage.Language";
$sql .= " FROM city";
$sql .= " INNER JOIN country ON country.Code = city.CountryCode";
$sql .= " INNER JOIN countrylanguage ON country.Code = countrylanguage.CountryCode";
$sql .= " WHERE city.ID = $cityID";
$sql .= " ORDER BY city.ID ASC";

$result = mysqli_query($conn,$sql);
if(!$result)
{
    die('Could not retrieve records from the Database: ' . mysqli_error($conn));
}

// Initialize an empty array to store all languages
$languages = [];

// Process the result
if ($row = mysqli_fetch_assoc($result)) {
    // Output details for the selected city
    echo"<h1>More Info for " . $row['Name']. "</h1>";
    echo "<p>City Name: " . $row['Name'] . "</p>";
    echo "<p>District: " . $row['District'] . "</p>";
    echo "<p>Population: " . $row['Population'] . "</p>";
    echo "<p>Country: " . $row['country'] . "</p>";
    echo "<p>Continent: " . $row['Continent'] . "</p>";

    // get all languages for the country
    do {
        $languages[] = $row['Language'];  // push each language to the array
    } while ($row = mysqli_fetch_assoc($result));

    // output the languages as a comma-separated list
    echo "<p>Languages Spoken in the Country: " . implode(', ', $languages) . "</p>";
    //implode = .join()
} else {
    echo "<p>No city found with ID $cityID.</p>";
}

