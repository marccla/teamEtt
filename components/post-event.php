<? include('db/config.php');
    
    //Pointing to what data to fetch/get
    
    
    try{
        // Create prepared statement
        $sql = "INSERT INTO events (title, text, img_url, category_id) VALUES (:title, :text, :imgurl, :categoryid)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters to statement
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':text', $_POST['text']);
        $stmt->bindParam(':imgurl', $_POST['img_url']);
        $stmt->bindParam(':categoryid', $_POST['category_id']);
        
        // Execute the prepared statement
        $stmt->execute();
        // echo "successsfull!";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // Close connection
    unset($conn);
    ?>