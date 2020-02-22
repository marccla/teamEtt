<? require('../db/config.php'); 

//Pointing to what data to fetch/get
$sql = "SELECT * FROM events";

$events = $conn->query($sql);

$conn->close();
