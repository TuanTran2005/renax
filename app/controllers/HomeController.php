<?php
namespace App\Controllers;
use App\Models\Product;
class HomeController extends BaseController{
  public $home;
  public function __construct(){
    $this->home= new Product();
    
  }
 

}

?>