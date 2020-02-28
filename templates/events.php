<? require('get-events.php'); ?>
<?
$loggedIn = false;
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $loggedIn = true;
}
?>

<div class="container">
  <div class="row mt-5">
    <?
    //Looping each row in table as its own "article"
    foreach ($events as $event) { ?>
      <a class="m-auto" href="single-post.php?id=<?php echo $event['id']; ?>">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="card mb-3" style="width: 18rem;">
            <?php if ($event['img_url']) : ?>
              <img src="<? echo $event['img_url'] ?>" class="card-img-top" alt="picture">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title" style="color: #3D4849;"><? echo $event['title'] ?></h5><span class="badge badge-primary"><? echo $event['name'] ?></span>
              <p class="card-text"><? echo substr($event['text'], 0, 100) ?><? echo strlen($event['text']) > 100 ? '...' : '' ?></p>
              <p class="card-text"><? echo $event['author'] ?></p>
              <?php if ($loggedIn) : ?>
                <a href="edit-event.php?id=<?php echo $event['id'] ?>" class="btn btn-primary" style="background-color: #B3997F;">Redigera</a>
                <a href="delete-event.php?id=<?php echo $event['id'] ?>" class="btn btn-secondary" style="width: 35% !important; height: 30% !imporant; background-color: #6DA0B3;">Ta bort</a>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </a>
    <?  } ?>
  </div>
</div>