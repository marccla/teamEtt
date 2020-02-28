<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an insert statement
    $sql = "INSERT INTO events (title, text, img_url, category_id, author) VALUES (:title, :text, :img_url, :category_id, :author)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":title", $param_title, PDO::PARAM_STR);
        $stmt->bindParam(":text", $param_text, PDO::PARAM_STR);
        $stmt->bindParam(":img_url", $param_img_url, PDO::PARAM_STR);
        $stmt->bindParam(":category_id", $param_category_id, PDO::PARAM_STR);
        $stmt->bindParam(":author", $param_author, PDO::PARAM_STR);

        // Set parameters
        $param_title = trim($_POST["title"]);
        $param_text = trim($_POST["content"]);
        $param_img_url = trim($_POST["imgurl"]);
        $param_category_id = trim($_POST["category"]);
        $param_author = trim($_SESSION['username']);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            //Refresh page on successful insert
            header("Refresh:0");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    // Close connection
    unset($conn);
}

?>



<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h6 class="modal-title" id="myModalLabel">Stäng</h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Nytt event</h2>
                    <div class="form-group">
                        <label>Titel</label>
                        <input required type="text" id="id" name="title" placeholder="En kulig titel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Länk till bild</label><input type="file" id="file" name="myFile">
                        <input type="text" id="imgurl" name="imgurl" placeholder="http://" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <textarea required class="form-control" id="content" name="content" placeholder="Skriv något här med va..." id="eventDescription" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="category">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-block" value="Skicka">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>