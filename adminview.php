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


<nav class="navbar navbar-expand-sm bg-light fixed-top shadow p-3 mb-5 bg-white rounded" style="width:100%;">
    
    <div class="navbar-header">
      <a  style=" text-align:center; color:pink; font-size: 30px;" class="navbar-brand" href="#"><strong>Global Napi Beauty</strong></a>
    </div>
    <ul class="navbar-nav"> 
      <li class="nav-item active">
        <a   style=" text-align:center; color:rosybrown;" class="nav-link" href="#"><strong>View Products</strong></a>
      </li>
      <li class="nav-item">
        <a  style=" text-align:center; color:rosybrown;" class="nav-link" href="addproductview.php"><strong>Add Product</strong></a>
      </li>
      <li class="nav-item">
        <a  style=" text-align:center;color:rosybrown;" class="nav-link" href="#"><strong>Logout</strong></a>
      </li>
    </ul>
  </nav>


  <div class="jumbotron">
<div class="row">
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
<img class="d-flex mr-3 img-thumbnail align-self-center"
        src=<?php echo $product->imagepath ?> alt=<?php echo $product->imagepath ?> >

<div class="media-body">
   <h2 class="mt-0"><?php echo $product->name ?></h2>
   <p class="d-none d-sm-block"><?php echo $product->description ?>.</p>
</div>
</div> 
<div class="card-footer border-0">
  <div class="row">
    <div class="col">
      <form action="updateproductview.php" method="post" >
<button type="submit" name="updatesubmit" value= "<?php echo $product->id; ?>"class="col-2 btn">Update<i class="fas fa-edit"></i>
<input type="hidden"  value="<?php echo $product->name;?>"   name="productname">
<input type="hidden"  name="productdescription" value="<?php echo $product->description; ?>">
<input type="hidden"  name="productimage" value="<?php echo $product->imagepath; ?>">
</button></div>
     </form>
<div class="col">
<button  class="col-5 btn">Delete <i class="fas fa-ruble-sign "></i></button></div>

  </div>
</div>
</div></div>




<?php
    }

  ?>




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



