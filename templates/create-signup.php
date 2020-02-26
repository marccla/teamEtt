<? include('../db/config.php');
    
//Pointing to what data to fetch/get


try{
    // Create prepared statement
    $sql = "INSERT INTO signups (event_id, sname, semail) VALUES (:eventid, :sname, :semail)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':eventid', $_POST['event_id']);
    $stmt->bindParam(':sname', $_POST['sname']);
    $stmt->bindParam(':semail', $_POST['semail']);
    
    // Execute the prepared statement
    $stmt->execute();
    header("Location: ../single-post.php?id={$_POST['event_id']}");
    // echo "successsfull!";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($conn);
?>
