<?php
require_once('productmodel.php');
class CartModel{
    public $cartproductsarray=[];
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "globalnapi";
    public $conn;
    public $cartid;

public function dbconnect(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo"connection error";
          return false;
        } 
        return true;
    }


 /*public function fetchcartproducts(){
   
        $sql="SELECT * FROM cart";
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
     
*/
public function addToCart($productid,$userid){
   $sql="INSERT INTO `cart`(`userid`, `productid`) VALUES ('$userid','$productid')";

   if(mysqli_query($this->conn,$sql)){
    echo"success";
            echo '<script>alert("addedd to cart")</script>';
          //$this->fetchproducts();
         // header('Location: adminview.php');
  }
  else{
    echo "noooooooooo";
            echo '<script>alert("nooooo")</script>';
  }
   }



  


}

?>