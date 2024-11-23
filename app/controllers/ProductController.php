<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController{
    public $product;

    public function __construct(){
        $this->product = new Product();
    }
    
    public function index(){
        $products = $this->product->getProduct();
   
       return $this->render('product.adduser',compact('products')); 
    }

    public function addProduct(){
        $products=$this->product->getcategories();
        return $this->render('product.categories',compact('products'));
    }

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