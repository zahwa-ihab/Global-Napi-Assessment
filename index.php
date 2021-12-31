<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
  

<body>
 <header class="intro-header">
  <div id="intro" class="view">
<div class="full-bg-img overlay">
  <nav class="navbar navbar-expand-sm bg-light fixed-top " style="width:100%;">
    
    <div class="navbar-header mr-auto">
    <a  style=" text-align:center; color:pink; font-size: 30px;" class="navbar-brand" href="#"><strong>Global Napi Beauty</strong></a>
    </div>
    <ul class="navbar-nav"> 
      <li class="nav-item">
      <a   style=" text-align:center; color:rosybrown;" class="nav-link" href="#"><strong>AboutUs</strong></a>
      </li>
      <li class="nav-item">
      <a   style=" text-align:center; color:rosybrown;" class="nav-link" href="#"><strong>ContactUs</strong></a>      </li>
      <li class="nav-item">
      <a   style=" text-align:center; color:rosybrown;" class="nav-link" href="#"><strong>Cart</strong></a>
      </li>
      <li class="nav-item">
      <a   style=" text-align:center; color:rosybrown;" class="nav-link" href="#"><strong>LogOut</strong></a>
      </li>
    </ul>
  </nav>

  <div class="text-center">
    <h2 class="h1 h1-reponsive white-text font-up font-bold mb-3 wow fadeInDown" id="intro-words">
      <strong>Natural Beauty </strong></h2>
      <h5 class="font-up mb-5 white-text wow fadeInDown" style="color: white;"><strong>By Global Napi</strong></h5>
      
  </div>
</div>
</div>
</header>

 
<div class="jumbotron">
<div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h3  style=" text-align:center; color:pink;"><strong>We Have Got Your Back!</strong></h3>
                        <h4 class="font-up mb-5 white-text wow fadeInDown" style="color: white; text-align:center; color:white;">
            You only get one body. We think you should rock it. Exfoliate, hydrate, rinse and repeat. From body scrubs to body oils
         we have got you covered to make you feel gorgeous and sexy all day long. 
         Ingredients such as coffee and essential oils are just some of things you will find in these must-have products.
        </h4>
         </div>
                </div>
            </div>
<?php
     include 'productsmodel.php';
     $productsModel= new productsModel();
     $productsArray= $productsModel->productsArray;
     foreach ($productsArray as $product) {
    
     
 ?>
  <div class="col d-flex justify-content-center">

<div class="card border-0  align-item-center">
<div class="card-header border-0">Beauty care made by love</div>
<div class="card-body border-0">  
  <div class="row">
    <div class="col-4">
<img class="d-flex mr-3 img-thumbnail align-self-center"
        src=<?php echo $product->imagepath ?> alt=<?php echo $product->imagepath ?> ></div>
        <div class="col-7">
        <h2 class="mt-0"><?php echo $product->name ?></h2>
   <p class="d-none d-sm-block"><?php echo $product->description ?>.</p>
        </div>
   </div>

</div> 
<form action="productdetailsview.php" method="post">
<div class="card-footer border-0">More Details 
<input type="hidden"  value="<?php echo $product->id;?>"   name="productid">
<input type="hidden"  value="<?php echo $product->name;?>"   name="productname">
<input type="hidden"  value="<?php echo $product->description;?>"   name="productdes">
<input type="hidden"  value="<?php echo $product->imagepath;?>"   name="productimage">
<button type="submit" name="moredetailssubmit" class="btn" ><i class="fa fa-plus"></i></button>
</div>
</form>
</div>
</div>




<?php
    }

  ?>





</body>





      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



