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

$stmt = $conn->prepare("SELECT IPv4, IPv6 FROM CONNECTED_DEVICES WHERE MAC_address = ?;");
$stmt->bind_param("s", $MAC);

$MAC = $_POST["MAC"];

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'><tr><th>IPv4</th><th>IPv6</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["IPv4"] . "</td><td>" . $row["IPv6"] . "</td></tr>";
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