<html>
<body>

<?php
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 
 error_reporting(E_ALL);

$conn = new mysqli("localhost", "ensf", "480", "network");

if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("DELETE FROM Blocked_Sites WHERE PC_User_ID = ?;");
$stmt->bind_param("s", $ID);
$ID = intval($_POST["ID"]);
$success = $stmt->execute();
if($success == true){
    echo "Successfully cleared blocked sites for user<br>";
}
else{
    echo "Clearing failed<br>";
}

$stmt = $conn->prepare("INSERT INTO Blocked_Sites VALUES (?, ?, ?);");
$stmt->bind_param("iss", $ID, $URL, $DT);

$ID = intval($_POST["ID"]);
$DT = date("Y-m-d", strtotime($_POST["DT"]));

$temp = $_POST["URL"];
$temp = explode(",", $temp);
$temp = str_replace(" ", "", $temp);

$URLs = $temp;
foreach($URLs as $URL){
    $success = $stmt->execute();
    if($success == true){
        echo "Successfully added blocked site<br>";
    }
    else{
        echo "Addition failed<br>";
    }
}

$conn->close();

?>

</body>
</html>