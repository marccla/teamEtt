

<?
include('templates/head.php');
include('templates/nav.php');
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="log-out.php" class="btn">Sign Out of Your Account</a>
    </p>
    <div class="container">
        <div class="row">
    <? 
    include('components/create-event.php'); 
    include('templates/events-for-welcome.php'); 
   ?>
   </div>
   </div>
   <? 
   include('templates/footer.php'); 
    ?>