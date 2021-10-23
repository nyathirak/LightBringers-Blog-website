<?php    
      session_start();
  require_once "configs/dbconnection.php";
  include "bars/navigationbar.php";

?>
    <main role="main">

<link href="../css/style.css" rel="stylesheet" />

      <div class="jumbotron style" style="background-color: #e3f2fd">

        <div class="container">
          <h1 class="display-3">Edit Article!</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">
            <h2>Edit Article</h2>

<?php
    $userId = $_SESSION["control"]["userId"]; 
if (isset($_GET["articleId"])){
  $articleId = $_GET["articleId"];
  
    $select_art = "SELECT * FROM articles LEFT JOIN users ON (users.`userId` = articles.`authorId`) WHERE articleId = '$articleId' LIMIT 1";
  
  $art_res = $conn->query($select_art);
  
    if ($art_res->num_rows > 0){ 
        
        $art_row = $art_res->fetch_assoc();
?>

<form method = "POST" action = "processes/processarticles.php" autocomplete = "off" accept-charset="UTF-8">

  <input placeholder="Enter your Author" class="form-control form-control-md" type="text" id="authorId" disabled value =
  "<?php print $_SESSION["control"]["Full_Name"]; ?>"/>


    <div class="form-group">
    <label for="article_title" >Article Title</label>
    <input placeholder="Enter Article Title" class="form-control form-control-md" name="article_title" type="text" id="article_title" value="<?php print $art_row["article_title"]; ?>" required autofocus />
  </div>
    
    <div class="form-group">
    <label for="article_full_text">Article Full Text</label>
    <textarea placeholder="Enter the article" class="form-control form-control-md" name="article_full_text" id="article_full_text" required style="height:250px" ><?php print $art_row["article_full_text"]; ?></textarea>
  </div>
  <div>
    <input class="btn btn-primary" type="submit" name="editarticle"  value="Edit Article">
  </div>
</form>
<?php
}else{
        header("Location: view.php");
    exit();
}

}
?>
          </div>
          <?php
 
      $userId = $_SESSION["control"]["userId"];

if (isset($_POST["editarticle"])){    

    $article_title = mysqli_real_escape_string($conn, $_POST["article_title"]);
    $article_full_text = mysqli_real_escape_string($conn, $_POST["article_full_text"]);
  
    
    $art_insert = "UPDATE articles authorId='$userId',article_title='$article_title',article_full_text='$article_full_text',article_created_date=UNIX_TIMESTAMP(),article_last_update=UNIX_TIMESTAMP(),article_display='',article_order='' WHERE userId='$userId'";
    
    if($conn->query($art_insert) === TRUE){
         echo "<script type='text/javascript'>alert(\"Article Edited!.\");window.location.href='../dashboard.php';</script>";
        
        exit();
    }else{
        print "Failed: " . $conn->error;
    }
    
    }
?>