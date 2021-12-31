<?php
//ob_start();
include 'productmodel.php';

class productsModel {
  // Properties
  public $productsArray=[];
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $dbname = "globalnapi";
  public $conn;
  // Methods
  function __construct() {
   $isConnected= $this->dbconnect();
   if($isConnected == "true"){
       $this->fetchproducts();
   }

  }

 public function dbconnect(){
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    if ($this->conn->connect_error) {
        echo"connection error";
      return false;
    } 
   // echo $this->conn;
    return true;
    
 
 }

 public function fetchproducts(){
   
   $sql="SELECT * FROM product";
   $result = $this->conn->query($sql);

   if($result->num_rows > 0){
       ////add products to my productsArray
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["description"]. "<br>";
        array_push($this->productsArray, new productModel($row["id"],$row["name"],$row["description"],$row["image"]));
      }

   }
    ////case no products to show
   else{
       echo "no products to show";
   }

 }

 public function AddProduct($name , $description, $filename, $fileTmpName){
     
  
  $conn = new mysqli("localhost", "root", "", "globalnapi");
  $sql="INSERT INTO `product`(`name`, `description`, `image`) VALUES ('$name','$description','uploadedImages/$filename')";
  if(mysqli_query($conn,$sql)){
    echo"success";
            echo '<script>alert("addedd")</script>';
          $this->fetchproducts();
          header('Location: adminview.php');
  }
  else{
    echo "noooooooooo";
            echo '<script>alert("nooooo")</script>';
  }

         //  $fileNameNew=uniqid('',true).".".$fileActualEx;
             $fileDestination='uploadedImages/'.$filename;
            move_uploaded_file($fileTmpName,$fileDestination);

 }

 public function updateProduct($productid,$productname,$productdes,$imagepath,$fileTmpName){
  $this->dbconnect();
  if($fileTmpName == "" && $imagepath == "")
 { 
   $sql="UPDATE `product` SET `name`='$productname',`description`='$productdes' WHERE id='$productid' ";
   
 }
else{

    $sql="UPDATE `product` SET `name`='$productname',`description`='$productdes',`image`='uploadedImages/$imagepath'
    WHERE id='$productid' ";
     $fileDestination='uploadedImages/'.$imagepath;
     move_uploaded_file($fileTmpName,$fileDestination);
  }

  if(mysqli_query($this->conn,$sql)){
          echo"success";
            echo '<script>alert("updated Successfully")</script>';
          $this->fetchproducts();
        
  }
  else{
            echo "noooooooooo";
            echo '<script>alert("nooooo")</script>';
  }
  header('Location: adminview.php');

//header('Location: adminview.php', true, 0);
/*function redirect($url) {
  ob_start();
  header('Location:adminview.php ');
  ob_end_flush();
  die();*/
}


 }

 //ob_end_flush();


?>