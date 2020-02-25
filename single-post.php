<? 
    include('db/config.php');
    include('templates/head.php');
    include('templates/nav.php'); 
    include('templates/get-events.php'); ?>


<? foreach ($events as $event) { 
     while($event['id'] == $_GET['id']) {?>
    <div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 order-lg-1 order-md-1 order-1 mt-5">
            <img class="event-img" src="<? echo $event['img_url'] ?>">
        </div>
        <div class="col-12 col-lg-6 col-md-6 order-lg-1 order-md-1 order-2 mt-5">
            <form action="post ">
                <h4>Kommer du på eventet?</h4> <br>
                <label for="name">Namn</label> <br>
                <input type="text" name="sname" placeholder="Namn" required> <br> <br>
                </input><label for="email">Epost</label> <br>
                <input type="text" name="semail" placeholder="Epost" required></input>
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
    <?
    include('templates/get-signups.php');
    foreach ($signups as $signup) { 
     while($event['id'] == $signup['event_id']) {?>
        <div class="col-12 col-lg-6 col-md-6">
            <h4>Vi som kommer</h4>
            <p><? echo $signup['sname']; ?></p>
            <p><? echo $signup['semail']; ?></p>
        </div>
     <? break; }
    } ?>
    </div>
</div>
    <? break;  } 
    
}?>
