<? 
    include('db/config.php');
    include('templates/head.php');
    include('templates/nav.php'); ?>

    <div class="container">
    <div class="row">
    <div class="col-12 col-lg-12 col-md-12">
    <img class="event-img" src="#"> 
    </div>
    <div class="col-12 col-lg-6 col-md-6">
    <form action="post">
    <h2>Kommer du på eventet?</h2>
    <label for="name">Namn</label>
    <input type="text" name="sname" placeholder="Ditt namn" required>
    </input><label for="email">Epost</label>
    <input type="text" name="semail" placeholder="Epost" required></input>
    </form>
    </div>
    <div class="col-12 col-md-6 col-lg6">
    <h2>EVENT TITLE</h2>
    <p>EVENT TEXT</p>
    
    </div>
    
    </div>
    </div>




















    <?
    include('templates/footer.php'); ?>