<? require('db/config.php');

$sql = "SELECT * FROM events";
$stmt = $conn->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);



//Pointing to what data to fetch/get
/*$sql = "SELECT * FROM events";

$events = $conn->query($sql);

$conn->close();

?>
*/