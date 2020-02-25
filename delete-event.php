<?
require_once "db/config.php";
if (isset($_GET['id'])) {
    $sql = 'DELETE FROM events WHERE events.id = :id';
    try {
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
            $param_id = trim($_GET['id']);
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                //Refresh page on successful insert
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Du kan inte ta bort ett event med deltagare');window.location.href='index.php';</script>";
    }
    // Close connection
    unset($conn);
}
