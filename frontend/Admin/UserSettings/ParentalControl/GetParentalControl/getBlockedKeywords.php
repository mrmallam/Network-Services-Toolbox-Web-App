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

$stmt = $conn->prepare("SELECT * FROM Blocked_Keywords WHERE PC_User_ID = ?;");
$stmt->bind_param("i", $ID);

$ID = intval($_POST["ID"]);

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "<table border='1'>
            <tr>
            <th>Keyword</th>
            <th>Date</th>
            </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
              <td>" . $row["Keyword"] . "</td>" .
              "<td>" . $row["Block_Date"] . "</td>" .
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