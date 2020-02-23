<? require('db/config.php');

//Pointing to what data to fetch/get
$sql = "SELECT * FROM events";
$stmt = $conn->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
