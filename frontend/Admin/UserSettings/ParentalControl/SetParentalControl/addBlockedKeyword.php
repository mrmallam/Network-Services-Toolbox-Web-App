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

$stmt = $conn->prepare("INSERT INTO Blocked_Keywords VALUES (?, ?, DATE(?));");
$stmt->bind_param("iss", $ID, $Keyword, $DT);

$ID = intval($_POST["ID"]);
$Keyword = $_POST["Keyword"];
$DT = date("Y-m-d", strtotime($_POST["DT"]));

$success = $stmt->execute();
if($success == true){
    echo "Successfully Added Blocked Keyword";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>