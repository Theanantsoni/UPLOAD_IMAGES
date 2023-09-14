<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="image">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>


<?php
if (isset($_POST['submit'])) 
{
    $targetDir = '../14. UPLOAD IMAGE/images/'; // Directory where uploaded images will be saved
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    // Attempt to move the uploaded file to the desired location

      if (!in_array($imageFileType, $allowedExtensions)) 
    {

        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) 
    {
        echo "<img src= ' $targetFile ' height=500 width=500>";

        echo "<br>";
        
        echo "Image uploaded successfully. File path: " . $targetFile;  
    } 

  

    else 
    {
        echo "Error uploading image.";
    }
}
?>
