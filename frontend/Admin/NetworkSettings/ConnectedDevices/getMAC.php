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

$stmt = $conn->prepare("SELECT MAC_address FROM CONNECTED_DEVICES WHERE (IPv4 = ? OR IPv6 = ?);");
$stmt->bind_param("ss", $IP4, $IP6);

$IP4 = $_POST["IP4"];
$IP6 = $_POST["IP6"];

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'><tr><th>MAC Address</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["MAC_address"] . "</td></tr>";
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