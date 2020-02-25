<? 
    include('db/config.php');
    include('templates/head.php');
    include('templates/nav.php'); 
    include('templates/get-events.php');
     ?>


<? foreach ($events as $event) { 
     while($event['id'] == $_GET['id']) {?>
    <div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 order-lg-1 order-md-1 order-1 mt-5">
            <img class="event-img" src="<? echo $event['img_url'] ?>">
        </div>
        <div class="col-12 col-lg-6 col-md-6 order-lg-1 order-md-1 order-2 mt-4">
            <form action="templates/create-signup.php" method="post">
                <h4>Kommer du på eventet?</h4> <br>
                <label for="name">Namn</label> <br>
                <input type="text" name="sname" placeholder="Namn" required></input> <br> <br>
                <label for="email">Epost</label> <br>
                <input type="email" name="semail" placeholder="Epost" required></input> <br> <br>
                <input class="d-none" type="text" name="event_id" value="<? echo $event['id']?>" required></input>
                
                <button class="btn primary-btn btn-outline-primary" type="Submit">Skriv upp dig</button>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg6 order-lg-2 order-md-2 order-1 mt-3">
            <h2 >
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
    include('templates/get-signups.php');
    foreach ($signups as $signup) { 
     while($event['id'] == $signup['event_id']) {?>
        <div class="col-12 col-lg-12 col-md-12 order-lg-5 order-md-5 order-5">
            
            <p><? echo $signup['sname']; ?>, <? echo $signup['semail']; ?></p>
            
        </div>
     <? break; }
    } ?>
    </div>
</div>
    <? break;  } 
    
}?>
