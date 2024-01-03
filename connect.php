<?php
session_start();

$host = "localhost";
$dbuser = "ytecdjwr_galleryDB";
$dbpass = "Karryklitze1";
$dbname = "ytecdjwr_galleryDB";
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if(mysqli_connect_error()){
    die('connection error:' . mysqli_connect_error() . mysqli_connect_errno());
}else {
    if (isset($_POST['btn'])) {
      if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = "uploads/". $name;
        
        $sql = "INSERT INTO images (img_name) VALUES ('$name')";
        $result = $conn->query($sql);
        if(move_uploaded_file($tmp, $path)){
          echo"<h3>Image uploaded Successfully</h3>";
        }else{
          echo"<h3>Image upload failed</h3>";
        }
      }else{
        echo "<h3>No file selected</h3>";
      }
    }
}


?>