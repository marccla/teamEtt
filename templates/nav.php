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
?>

<nav class="navbar navbar-expand navbar-expand-lg">
  <a class="navbar-brand" href="index.php">EventIcon</a>
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
      <a href="login.php">
        <div class="btn btn-outline-primary my-2 my-sm-0">Login</div>
      </a>
    </form>
  </div>
</nav>