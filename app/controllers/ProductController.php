<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController{
    public $product;

    public function __construct(){
        $this->product = new Product();
    }
    
    public function index(){
        $products = $this->product->getuser();
   
       return $this->render('product.adduser',compact('products')); 
    }

    public function addProduct(){
        $products=$this->product->getcategories();

        return $this->render('product.categories',compact('products'));
    }
    public function update_Product(){
        if (isset($_POST['add'])) {
           $tenlh=$_POST['tenlh'];
           $mt=$_POST['mt'];

        }
    }
    public function get_product(){
        $products=$this->product->getproduct();
        $productx=$this->product->getcategories();
        return $this->render('product.product',compact('products','productx'));
    }
    public function post_product(){
        if (isset($_POST['them'])) {
            $total=count($_FILES['product_image']['name']);
            $image_paths = array();
            for ($i=0; $i < $total; $i++) { 
               $img=basename($_FILES['product_image']['name'][$i]);
               $url = 'app/img/';  
               $noi=$url.$img;
               if (move_uploaded_file($_FILES['product_image']['tmp_name'][$i],$noi)) {
                $image_paths[]=$noi;
               }
              
            }
               $image_paths_json=json_encode($image_paths);
               $colors = explode(',', $_POST['product_color']);
               $colors_json = json_encode($colors);
               
               $this->product->addProduct($_POST['product_name'],$image_paths_json,$_POST['product_title'],$_POST['product_price'],$colors_json,$_POST['product_manufacturer'],$_POST['product_seat_count'],$_POST['edit_product_move'],$_POST['product_fuel'],$_POST['product_consumption']);
               flash('success', "Thêm thành công", 'get-product');
            
        }
        
    }
// <-------------------------------------------------------->
    public function postProduct(){
        // validate form
        if(isset($_POST['gui'])){
            $error = [];
            // rỗng
            if(empty($_POST['ten'])){
                $error[] = "Bạn vui lòng nhập tên";
            }
            if(empty($_POST['gia'])){
                $error[] = "Bạn vui lòng nhập gia";
            }
            if(count($error)>=1){
                flash('errors', $error, 'add-product');
            }else{
                $check = $this->product->idUpdate(null,  $_POST['ten'],$_POST['gia']);
                if ($check){
                    flash('success', "Thêm thành công", 'list-product');
                }
            }
        }
    }
    public function updateProduct($id)
    {
        $sql=$this->product->idProduct($id);
        return $this->render('product/update.php', compact('sql'));
    }
    public function addUpdate($id){
        if(isset($_POST['gui'])){
            $error = [];
            // rỗng
            if(empty($_POST['ten'])){
                $error[] = "Bạn vui lòng nhập tên";
            }
            if(empty($_POST['gia'])){
                $error[] = "Bạn vui lòng nhập gia";
            }
            if(count($error)>=1){
                flash('errors', $error, 'add-product');
            }else{
                $check = $this->product->idUpdate($id,  $_POST['ten'],$_POST['gia']);
                if ($check){
                    flash('success', "Thêm thành công", 'list-product');
                }
            }
        }
    }
}


?>