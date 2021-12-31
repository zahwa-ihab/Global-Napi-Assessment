<?php
//session_start();
require_once('productsmodel.php'); 
class productController{
 
    function addProduct(){
        $products= new productsModel();

        if(isset($_POST['submit'])){
            echo '<script>alert("submitted controlleer")</script>';
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
             $products-> AddProduct($productname , $productdes, $filename, $fileTmpName);
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
    }


    public function UpdateProductDetails(){

        if(isset($_POST['updateproductformsubmit'])){
            $productid=$_POST['id']; //hidden
            $name=$_POST['productname'];
            $des=$_POST['productdescription'];
            $file=$_FILES['fileToUpload']; ///image 
           // $image=$_POST['$productimage']; ////hidden value incase admin didn't change pic
           

        if(empty($name)){
            $name=$_POST['hiddenname']; ////hidden
          
        }
        if(empty($name)){
            $des=$_POST['hiddendes'];////hidden
        }

        
        $filename= $_FILES['fileToUpload']['name'];
        $filesize= $_FILES['fileToUpload']['size'];
        $fileTmpName= $_FILES['fileToUpload']['tmp_name'];
        $fileError=$_FILES['fileToUpload']['error'];
        $filetype=$_FILES['fileToUpload']['type'];
       
        if($fileError != 0)
        {   //  echo '<script>alert("emty file")</script>';
            $products= new productsModel();
            $products->updateProduct($productid,$name,$des, "", ""); //incase admin didn't add new pic for a product
        }
        else{
           
          
            $fileExt= explode('.',$filename);
            $fileActualEx= strtolower(end($fileExt));
          
            $allowedExt= array("jpg","jpeg","png");
            
            //echo '<script>alert("controoler"'.$fileError.')</script>';
          
            if(in_array($fileActualEx,$allowedExt)){
                 if($fileError == 0){
                      if($filesize < 1000000){
                        $products= new productsModel();
                        $products->updateProduct($productid,$name,$des, $filename, $fileTmpName);
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
                echo $fileError;
                echo gettype( $fileError);
                echo"wrong file type";
            }
          
            

        }
    }
}

}
?>