
<? 
session_start();

include('templates/nav.php');
    include('db/config.php');
    include('templates/head.php');
    include('components/create-event.php');
    include('templates/events.php');
    include('templates/footer.php');
    include('templates/get-users.php');
var_dump($users['username']);


    ?>
   