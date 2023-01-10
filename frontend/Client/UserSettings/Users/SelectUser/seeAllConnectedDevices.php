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
    "SELECT C.* 
    FROM Connected_Devices AS C WHERE User_ID = ?;"
);
$stmt->bind_param("i", $ID);

$ID = intval($_POST["ID"]);

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'>
            <tr>
            <th>Hostname</th>
            <th>IPv4</th>
            <th>IPv6</th>
            <th>Connection Type</th>
            <th>MAC Address</th>
            <th>Router SSID</th>
            </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
              <td>" . $row["Hostname"] . "</td>" .
              "<td>" . $row["IPv4"] . "</td>" .
              "<td>" . $row["IPv6"] . "</td>" .
              "<td>" . $row["Connection_Type"] . "</td>" .
              "<td>" . $row["MAC_address"] . "</td>" .
              "<td>" . $row["R_SSID"] . "</td>" .
              "</tr>";
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