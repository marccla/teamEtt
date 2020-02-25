<? require('get-events.php');?>

<div class="col-12 col-lg-6 col-md-6">
<?
//Looping each row in table as its own "article"
    foreach ($events as $event) {
     ?> 
 <div class="col-lg-12 col-12 col-12">
    <div class="card">
  <img src="<? echo $event['img_url'] ?>" class="card-img-top" alt="picture">
  <div class="card-body">
    <h5 class="card-title" style="color: #3D4849;"><? echo $event['title'] ?></h5>
    <p class="card-text"><? echo $event['text'] ?></p>
    <a href="#" class="btn btn-primary" style="background-color: #B3997F;">Edit</a>
    <a href="#" class="btn btn-secondary" style="width: 30% !important; height: 30% !important; background-color: #6DA0B3;">Delete</a>
  </div>
 </div>
</div>
    <? } ?>
    </div>
  </div> 
 </div>

 