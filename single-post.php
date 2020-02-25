<? include('db/config.php');
include('templates/head.php');
include('templates/nav.php'); 
include('templates/get-events.php');?>
    





<? 


// loop through each event
foreach ($events as $event) { 
    // We check that the events id is matching with current event id
     while($event['id'] == $_GET['id']) {?>
    <div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 order-lg-1 order-md-1 order-1 mt-5">
            <img class="event-img" src="<? echo $event['img_url'] ?>">
        </div>
        <div class="col-12 col-lg-6 col-md-6 order-lg-1 order-md-1 order-2 mt-5">
            <form method="post">
                <h4>Kommer du på eventet?</h4> <br>
                <label for="name">Namn</label> <br>
                <input type="text" name="sname" placeholder="Namn" required> <br> <br>
                </input><label for="email">Epost</label> <br>
                <input type="email" name="semail" placeholder="Epost" required></input> <br> <br>
                <input class="d-none" type="text" name="event_id" value="<? echo $event['id']; ?>" required></input>
                
                <button class="btn primary-btn btn-outline-primary" type="submit" value="submit">Skriv upp dig</button>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg6 order-lg-2 order-md-2 order-1">
            <h2>
                <? echo $event['title'] ?>
            </h2>
            <p>
                <? echo $event['text'] ?>
            </p>
        </div>
        <div class="col-12 col-lg-12 col-md-12 order-lg-5 order-md-5 order-5 mt-5 mb-5">
            <h4>Vi som kommer</h4>
            
        </div>
        
    <?
    // we include our signups and loop them
    include('templates/get-signups.php');
    foreach ($signups as $signup) { 
        // we check that the signups event id is matching this events id
     while($event['id'] == $signup['event_id']) {?>
        <div class="signups col-12 col-lg-12 col-md-12 order-lg-5 order-md-5 order-5">
            
            <p><? echo $signup['sname']; ?>, <? echo $signup['semail']; ?></p>
            
        </div>
     <? break; } 
    } ?>
    </div>
</div>
    <? break;  }  // coffee time.
    
}?>

<?

if(isset($_POST['submit'])){
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
        // We're Happy
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
     
    // Close connection
    unset($conn);
    
    
    
        
    // your code
} ?>

