<? require('db/config.php');

//Pointing to what data to fetch/get
$sql = "SELECT * FROM signups";
$stmt = $conn->prepare($sql);
$stmt->execute();
$signups = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
