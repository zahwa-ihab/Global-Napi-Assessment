<!--
<!DOCTYPE html>
<html>
<body>
<h1>uploadddd</h1>
<form action="uploadview.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>-->
<?php
if(isset($_POST['submit'])){
  echo '<script>alert("submitted")</script>';
  echo "hhhhhhhhhhhhhhhh";
  $file=$_FILES['fileToUpload'];
  $filename= $_FILES['fileToUpload']['name'];
  $filesize= $_FILES['fileToUpload']['size'];
  $fileTmpName= $_FILES['fileToUpload']['tmp_name'];
  $fileError=$_FILES['fileToUpload']['error'];
  $filetype=$_FILES['fileToUpload']['type'];

  $fileExt= explode('.',$filename);
  $fileActualEx= strtolower(end($fileExt));

  $allowedExt= array("jpg","jpeg","png");

  $productname= $_POST['productname'];
  $productdes= $_POST['productdescription'];

  if(in_array($fileActualEx,$allowedExt)){
       if($fileError == 0){
            if($filesize < 1000000){

			$conn = new mysqli("localhost", "root", "", "globalnapi");
			$sql="INSERT INTO `product`(`name`, `description`, `image`) VALUES ('$productname','$productdes','uploadedImages/$filename')";
			if(mysqli_query($conn,$sql)){
				echo"success";
			}
			else{
				echo "noooooooooo";
			}

             //  $fileNameNew=uniqid('',true).".".$fileActualEx;
                 $fileDestination='uploadedImages/'.$filename;
                move_uploaded_file($fileTmpName,$fileDestination);
				}
			else{
				echo "file is too big";
			}
	   }
	   else{
		   echo "there was an error uploading";
	   }
  }
  else{
	  echo"wrong file type";
  }

}
?>