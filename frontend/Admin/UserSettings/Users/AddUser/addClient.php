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

$stmt = $conn->prepare("INSERT INTO Client VALUES (?, ?, ?, ?);");
$stmt->bind_param("isss", $ID, $Name, $Username, $Password);

$ID = intval($_POST["ID"]);
$Name = $_POST["Name"];
$Username = $_POST["Username"];
$Password = $_POST["Password"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully Added Client";
}
else{
    echo "Could not add Client";
}

$conn->close();

?>

</body>
</html>