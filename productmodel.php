<?php
//session_start();

class productModel {
  // Properties
  public $id;
  public $name;
  public $description;
  public $imagepath;
  // Methods
  function __construct(int $id,string $name, string $description,string $imagepath ) {
    $this->id=$id;
    $this->name=$name;
    $this->description=$description;
    $this->imagepath=$imagepath;
  //  echo $imagepath;

  }
  public function getProductDetails(int $id)
  {
    return $this->fname;
  }
}

  ?>