<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="topnav">
            <h1>IMAGE GALLERY</h1>
        </div>
        <div class="content">
            <form class="upload" action="index.php" method="POST" enctype="multipart/form-data">
                <input type="file" class="f" name="image">
                <img src="" alt="">
                <button class="btn" name="btn">Upload Image</button>
            </form>
            <?php require "connect.php"; ?>
        </div>
        <div class="img-grid">
             <?php 
                $mysql = "SELECT * FROM images";
                $result = $conn->query($mysql);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class='img-c'>
                        <img class="img" src="uploads/<?php echo $row['img_name']; ?>" >
                        <div class="cbtn">
                        <button class= 'update btn cr' name='delete-btn' onclick="">update</button>
                        <button class= 'delete btn cr' name='delete-btn' onclick="">delete</button>
                        </div>
                        <h3><?php echo $row['img_name']; ?></h3>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>