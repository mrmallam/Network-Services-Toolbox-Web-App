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

$stmt = $conn->prepare(
    "SELECT Security_level, Black_list_URL, White_list_URL, Blocked_port 
    FROM FIREWALL, Black_list, White_list, Blocked_ports, Router 
    WHERE WiFi_SSID = ? AND (Router.HW_MAC_Address = FIREWALL.HW_MAC_address) AND 
    FIREWALL.HW_MAC_address = Black_list.FW_HW_MAC_address AND 
    FIREWALL.HW_MAC_address = White_list.FW_HW_MAC_address AND 
    FIREWALL.HW_MAC_address = Blocked_ports.FW_HW_MAC_address 
    ORDER BY WiFi_SSID;"
);

$stmt->bind_param("s", $SSID);

$SSID = $_POST["SSID"];

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'><tr><th>Security Level</th><th>Black list site</th><th>White list site</th><th>Blocked port</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["Security_level"] . "</td><td>" . $row["Black_list_URL"] . "</td><td>" . $row["White_list_URL"] . "</td><td>" . $row["Blocked_port"] . "</td><tr>";
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