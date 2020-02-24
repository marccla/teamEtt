<?
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Nytt event</h2>
                <div class="form-group">
                    <label>titel</label>
                    <input required type="text" name="title" placeholder="En kulig titel" class="form-control">
                </div>
                <div class="form-group">
                    <label>Länk till bild</label>
                    <input required type="text" name="imgurl" value="http://" class="form-control">
                </div>
                <div class="form-group">
                    <label>text</label>
                    <textarea required class="form-control" name="content" placeholder="Skriv något här med va..." id="eventDescription" rows="7"></textarea>
                </div>
                <select class="custom-select">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php } ?>
                </select>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Skicka">
                </div>
            </form>
        </div>
    </div>
</div>