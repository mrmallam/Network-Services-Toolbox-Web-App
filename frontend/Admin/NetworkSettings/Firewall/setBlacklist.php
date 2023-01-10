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

$stmt = $conn->prepare("DELETE FROM Black_list WHERE FW_HW_MAC_address = ?;");
$stmt->bind_param("s", $MAC);
$MAC = $_POST["MAC"];
$success = $stmt->execute();
if($success == true){
    echo "Successfully cleared blacklist<br>";
}
else{
    echo "Clearing failed<br>";
}

$stmt = $conn->prepare("INSERT INTO Black_list VALUES (?, ?);");
$stmt->bind_param("ss", $MAC, $Site);

$MAC = $_POST["MAC"];

$temp = $_POST["Site"];
$temp = explode(",", $temp);
$temp = str_replace(" ", "", $temp);

$Sites = $temp;
foreach($Sites as $Site){
    $success = $stmt->execute();
    if($success == true){
        echo "Successfully added blacklist<br>";
    }
    else{
        echo "Addition failed<br>";
    }
}

$conn->close();

?>

</body>
</html>