<?php
include('templates/head.php');
include('templates/nav.php');

require_once "db/config.php";

// Fetch data to prefill values/text
$sql = "SELECT events.id, events.title, events.text, events.img_url, author, categories.name FROM events JOIN categories on events.category_id = categories.id WHERE events.id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
$param_id = trim($_GET['id']);
$stmt->execute();
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE events SET title = :title, text = :text, img_url = :img_url, category_id = :category_id,  author = :author WHERE id = :id";
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
        $stmt->bindParam(":title", $param_title, PDO::PARAM_STR);
        $stmt->bindParam(":text", $param_text, PDO::PARAM_STR);
        $stmt->bindParam(":img_url", $param_img_url, PDO::PARAM_STR);
        $stmt->bindParam(":category_id", $param_category_id, PDO::PARAM_STR);
        $stmt->bindParam(":author", $param_author, PDO::PARAM_STR);


        // Set parameters
        $param_id = trim($_POST["id"]);
        $param_title = trim($_POST["title"]);
        $param_text = trim($_POST["content"]);
        $param_img_url = trim($_POST["imgurl"]);
        $param_category_id = trim($_POST["category"]);
        $param_author = trim($_SESSION['username']);


        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            //Redirect to index page on successful update
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    // Close connection
    unset($conn);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Uppdatera event</h2>
    <div class="form-group">
        <label>Titel</label>
        <input required type="text" id="id" name="title" value="<? echo $event['title'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Länk till bild</label>
        <input type="text" id="imgurl" name="imgurl" placeholder="https://" value="<? echo $event['img_url'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Text</label>
        <textarea required class="form-control" id="content" name="content" placeholder="Ändra något här med va..." id="eventDescription" rows="7"><? echo $event['text'] ?></textarea>
    </div>
    <div class="form-group">
        <select class="custom-select" name="category">
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <input class="d-none" type="text" name="id" value="<? echo $_GET['id'] ?>" required></input>
    <div class="form-group">
        <input type="submit" class="btn-block" value="Skicka">
    </div>
</form>

<? include('templates/footer.php'); ?>