<?php 
require_once('usermodel.php');
class UserController{
  public function addtocart(){
      $user= new usertModel();
    if(isset($_POST['addtocartsubmit'])){
        
        $productid= $_POST['productid'];
        $user->addtocart($productid,"1");  ///userid for now is static however should be obtained from $_SESSION global varibale after login is constructed
    }

  }
}
?>