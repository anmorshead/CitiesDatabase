<?php
require_once('isLoggedIn.php');
checkIfLoggedIn();


require_once "dbConn.php";
$conn = getDbConnection();

$cityID = $_POST['id'];

if (!empty($_POST['Name']) && !empty($_POST['District']) && !empty($_POST['Population']) && !empty($_POST['country'])) {
    $update_sql = "UPDATE city SET Name = '";
    $update_sql .= $_POST['Name'];
    $update_sql .= "', District = '";
    $update_sql .= $_POST['District'];
    $update_sql .= "', Population = '";
    $update_sql .= $_POST['Population'];
    $update_sql .= "', CountryCode = '";
    $update_sql .= $_POST['country'];
    $update_sql .= "' WHERE ID = ";
    $update_sql .= $cityID;
    $update_sql .= ";";

    $result = mysqli_query($conn, $update_sql);
    if (!$result) {
        die("Unable to update record: " . mysqli_error($conn));
    } else {
        echo "<h2>Successfully updated " . mysqli_affected_rows($conn) . " Record(s).</h2>";
        ?>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>
        <?php
    };
}

    closeDbConnection($conn);