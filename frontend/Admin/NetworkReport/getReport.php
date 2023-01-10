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

$stmt = $conn->prepare("SELECT R.* FROM Network_Report AS R, Generates AS G WHERE G.WiFi_SSID = ? AND G.Date_Time = ?;");
$stmt->bind_param("ss", $SSID, $DT);

$SSID = $_POST["SSID"];
$DT = date("Y-m-d", strtotime($_POST["DT"]));

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'>
            <tr>
            <th>Date & Time</th>
            <th>Total Data Used</th>
            <th>Total Connected Users</th>
            <th>Average Speed</th>
            <th>Average Connection Quality</th>
            </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
              <td>" . $row["Date_Time"] . "</td>" .
              "<td>" . $row["Total_Data_Used"] . "</td>" .
              "<td>" . $row["Total_Connected_Users"] . "</td>" .
              "<td>" . $row["Average_Speed"] . "</td>" .
              "<td>" . $row["Average_Connection_Quality"] . "</td>" .
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