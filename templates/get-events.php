<? require('db/config.php');

//Pointing to what data to fetch/get
$sql = "SELECT * FROM events JOIN categories on events.category_id = categories.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
