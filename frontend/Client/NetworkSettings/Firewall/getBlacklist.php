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

$stmt = $conn->prepare("SELECT Black_list_URL FROM Black_list WHERE FW_HW_MAC_address = ?;");
$stmt->bind_param("s", $MAC);

$MAC = $_POST["MAC"];

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'><tr><th>Black Listed Sites</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["Black_list_URL"] . "</td><tr>";
    }
    echo "</table>";
}
else{
    echo "0 results";
}

$conn->close();

?>

</body>
</html>