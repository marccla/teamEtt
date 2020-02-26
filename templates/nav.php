<?
// TODO: move to separate file
include('db/config.php');
$categories = [];
try {
  $sql = "SELECT * FROM categories";
  $result = $conn->query($sql);
  $categories = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
$loggedIn = false;
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $loggedIn = true;
}
?>

<nav class="navbar navbar-expand navbar-expand-lg">
  <img src="images/logotritranspa.png" alt="" style="width:50px;height:50px;"></img>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategorier
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($categories as $category) { ?>
              <a class="dropdown-item" href="category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
            <?php } ?>
          </div>
        </li>
      </ul>
      <?php if ($loggedIn) : ?>
        <a href="#" class="btn btn-outline-primary my-2 my-sm-0" id="sentMessage" data-toggle="modal" data-target="#largeModal">Nytt event</a>
        <a href="log-out.php">
          <div class="btn btn-outline-primary my-2 my-sm-0">Sign out</div>
        </a>
      <?php else : ?>
        <a href="login.php">
          <div class="btn btn-outline-primary my-2 my-sm-0">Login</div>
        </a>
      <?php endif; ?>
    </form>
  </div>
</nav>