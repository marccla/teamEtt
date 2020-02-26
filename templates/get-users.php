<? require('db/config.php');

//Pointing to what data to fetch/get
$sql = "SELECT username FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>