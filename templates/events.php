<? require('get-events.php');?>

<div class="container">
 <div class="row">
<?
//Looping each row in table as its own "article"
    foreach ($events as $event) {
     ?> 
 <div class="col-lg-3 col-6 col-12">
    <div class="card" style="width: 18rem;">
  <img src="<? echo $event['img_url'] ?>" class="card-img-top" alt="picture">
  <div class="card-body">
    <h5 class="card-title" style="color: #3D4849;"><? echo $event['title'] ?></h5>
    <p class="card-text"><? echo $event['text'] ?></p>
    <a href="#" class="btn btn-primary" style="background-color: #B3997F;">Edit</a>
    <a href="#" class="btn btn-secondary" style="width: 30% !important; height: 30% !imporant; background-color: #6DA0B3;">Delete</a>
  </div>
 </div>
</div>
    <? } ?>
  </div> 
 </div>

 