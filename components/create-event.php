<div class="col-12 col-md-6 col-lg-6">

<form>
  <div class="form-group">
    <label for="titel">Eventets namn</label>
    <input type="text" class="form-control" name="title" placeholder="Namn på event">
  </div>
  <div class="form-group">
    <label for="information">Mer info om Eventet</label>
    <textarea class="form-control" name="text" rows="6"></textarea>
  </div>
  <div class="form-check">
  <? 
  include('db/config.php');
  include('templates/get-categories.php');
  foreach ($categories as $category) { ?>
    <input type="radio" name="category" value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> 
<? } ?> 
</div>
<button class="btn btn-outline-primary mt-3" type="input" value="submit-event">Lägg till Event</button>
</form>


</div>