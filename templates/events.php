<? require('get-events.php');?>

<div class="container">
 <div class="row">
<?
//Looping each row in table as its own "article"
    foreach ($events as $event) {?> 
 <a href="single-post.php?id=<?php echo $event['id'];?>"><div class="col-lg-3 col-md-6 col-12" id="<? echo $event['id'] ?>">
    <div class="card" style="width: 18rem;">
  <img src="<? echo $event['img_url'] ?>" class="card-img-top" alt="picture">
  <div class="card-body">
    <h5 class="card-title" style="color: #3D4849;"><? echo $event['title'] ?></h5>
    <p class="card-text"><? echo $event['text'] ?></p>
  </div>
 </div>
</div>
    <? } ?> 
  </div> 
 </div>
 </a>

 