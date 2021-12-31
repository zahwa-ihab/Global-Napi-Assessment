
<?php
require_once('cartmodel.php');
class usertModel {
  // Properties
  public $id;
  public $email;
  public $password;
  public $cart;  ////aggregation 
  // Methods
  function __construct() {
    $this->cart=new CartModel();

  }
  public function addtocart($productid,$userid)
  {
    $this->cart->addToCart($productid,$userid);
    header('Location: index.php');
  }
}

?>