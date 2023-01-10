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

$stmt = $conn->prepare("INSERT INTO Network_Report VALUES (?, ?, ?, ?, ?);");
$stmt->bind_param("siidd", $DT, $TD, $TU, $AS, $ACQ);

$DT = date("Y-m-d", strtotime($_POST["DT"]));
$TD = intval($_POST["TD"]);
$TU = intval($_POST["TU"]);
$AS = (double)$_POST["AS"];
$ACQ = (double)$_POST["ACQ"];

$success = $stmt->execute();
if($success == true){
    echo "Succesfully added Network Report <br>";
}
else{
    echo "Addition failed<br>";
}

$stmt = $conn->prepare("INSERT INTO Generates VALUES (?, ?);");
$stmt->bind_param("ss", $SSID, $DT);

$SSID = $_POST["SSID"];
$DT = date("Y-m-d", strtotime($_POST["DT"]));

$success = $stmt->execute();
if($success == true){
    echo "Successfully linked Router and Report<br>";
}
else{
    echo "Link failed<br>";
}

$conn->close();

?>

</body>
</html>