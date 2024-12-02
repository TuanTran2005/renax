<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController{
    public $product;

    public function __construct(){
        $this->product = new Product();
    }
    public function indes(){
        $user=$this->product->userTotal();
        $reviews=$this->product->product_reviews();
        $product=$this->product->productTotal();
        $categories=$this->product->categoriesTotal();
        return $this->render('product.user', compact('user','reviews','product','categories'));
    }
    public function index(){
        $products = $this->product->getuser();
        
       return $this->render('product.adduser',compact('products')); 
    }

    public function addProduct(){
        $products=$this->product->getcategories();
          
        return $this->render('product.categories',compact('products'));
    }
    public function add_cartegori(){
        if (isset($_POST['add'])) {
           $tenlh=$_POST['tenlh'];
           $mt=$_POST['mt'];
           $this->product->category($tenlh,$mt);
           flash('success', "Thêm thành công", 'add-product');
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
               $url = 'imgs/';  
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
    public function update_cartegori(){
       $this->product->updatecate($_POST['tenlh'],$_POST['mt'],$_POST['id']);
       flash('success', "Sửa thành công", 'add-product');
    }
    public function delete_cartegori($id){
        $this->product->delete_cartegorr($id);
        flash('success', "xóa thành công", 'add-product');
    }
    public function update_user(){
        if (isset($_POST['add'])) {
            $img=basename($_FILES['image']['name']);
            $url = 'imgs/';  
            $noi=$url.$img;
            move_uploaded_file($_FILES['image']['tmp_name'],$noi);
            $this->product->updateUser($_POST['editid'],$_POST['editName'],$noi,$_POST['pass'],$_POST['address'],$_POST['editPhone'],$_POST['editEmail'],$_POST['date'],$_POST['status'],$_POST['gender'],$_POST['role']);
            flash('success', "Sửa thành công", 'list-user');
        }
    }
    public function delete_user(){
        $this->product->deleteUser($_POST['delete_user']);
         flash('success', "Xóa thành công", 'list-user');
    }
    public function update_product(){
 if (isset($_POST['capnhat'])) {
    
    if ( isset($_FILES['product_image']) && !empty($_FILES['product_image']['name'])) {
        $total=count($_FILES['product_image']['name']);
        $image_paths = array();
        for ($i=0; $i < $total; $i++) { 
           $img=basename($_FILES['product_image']['name'][$i]);
           $url = 'imgs/';  
           $noi=$url.$img;
           if (move_uploaded_file($_FILES['product_image']['tmp_name'][$i],$noi)) {
            $image_paths[]=$noi;
           }
          
        }
           $image_paths_json=json_encode($image_paths);
           $images=$_POST['img'];
           foreach ($images as $value) {
            unlink($value);
           }
          
    }else{
 $image_paths_json=$_POST['img'];
    }
   $this->product->update_product($_POST['product_name'],$image_paths_json,$_POST['product_title'],$_POST['product_price'],$_POST['product_category'],$_POST['product_id'],$_POST['product_color'],$_POST['product_seat_count'],$_POST['product_move'],$_POST['product_consumption'],$_POST['product_fuel'],$_POST['product_idif']);
   flash('success', "Sửa thành công", 'get-product');
 }
    }
    public function delete_product(){

        $this->product->deleteProduct($_POST['delete_product']);
        flash('success', "Xóa thành công", 'get-product');
    }
// <-------------------------------------------------------->
  public function userpage(){
    $product=$this->product->userPage();
     return $this->render('userPare.index',compact('product'));
  }
  public function product_page(){
    $id = isset($_GET['id']) ? $_GET['id'] : 1;
     
    if (isset($_GET['timkiem'])) {
        $dulieu=$_GET['dulieu'];
        $product=$this->product->productPages($dulieu,$id );
    $productx=$this->product->nut();
        return $this->render('userPare.product',compact('product','productx'));
    }else{
        $product=$this->product->productPage($id);
        $productx=$this->product->nut();
    return $this->render('userPare.product',compact('product','productx'));
    }
    
    
  }
  public function login(){
    return $this->render('userPare.login');
  }
  public function check() {
    $product = $this->product->getuser();  // Lấy danh sách người dùng
 
    if (isset($_POST['checks'])) { // Kiểm tra xem có form được gửi không
        // Kiểm tra nếu email và mật khẩu đã được gửi từ form
        $email = $_POST['nameLogin'] ; 
        $password = $_POST['passwordLogin'] ;
        
        if ($email && $password) {
            // Tìm người dùng theo email
            $user = null;
            foreach ($product as $value) {
                if ($value->email == $email) {
                    $user = $value;
                    break;
                }
            }
    
            if ($user) {
                // Kiểm tra mật khẩu nếu người dùng tồn tại
                if ($password==$user->password) {
                    // Lưu thông tin vào session
                    $_SESSION['auth'] = [
                        'id' => $user->id,
                        'email' => $user->email,
                        'role' => $user->role,
                    ];
                    flash('success', "Đăng nhập thành công!", 'userpage');
                    // Chuyển hướng tới trang người dùng sau khi đăng nhập
                    header("Location: http://renax.test/userpage"); 
                    exit();
                } else {
                    flash('error', "Sai mật khẩu!", 'login');
                }
            } else {
                flash('error', "Email không tồn tại!", 'login');
            }
        } else {
            flash('error', "Vui lòng nhập đầy đủ thông tin!", 'login');
        }
    }
}

public function detailProduct(){
    $id=$_GET['id'];
    $productxsmax=$this->product->userPagex();
    $productxs=$this->product->review($id);
    $product=$this->product->detail_Product($id);
    $servise=$this->product->servise($id);
    return $this->render('userPare.detail_Product',compact('product','productxs','productxsmax','servise'));
}
public function review($id){
    if (isset($_POST['review'])) {
        $product=$id;
        $user=$_SESSION['auth']['id'];
       $this->product->danhgia($product,$user,$_POST['rating'],$_POST['content']);
       header("Location: http://renax.test/product_page");

    }
}
public function cartProduct(){
    return $this->render('userPare.cart');
}
public function addToCart(){
    if (!isset($_SESSION['cart'])) {
       $_SESSION['cart']=[];
    }
    if (isset($_POST['add'])) {
        $product_id = $_GET['id'];
        $quantity = $_POST['quantity'];
        $color=$_POST['color'];
        $images=$_POST['images'];
        $nameProduct=$_POST['nameProduct'];
        $priceProduct=$_POST['price'];
        if (isset($_SESSION['cart'][$product_id][$images][$nameProduct][$color][$priceProduct])) {
            $_SESSION['cart'][$product_id][$images][$nameProduct][$color][$priceProduct]+=$quantity;
        }else {
            $_SESSION['cart'][$product_id][$images][$nameProduct][$color][$priceProduct]=$quantity;
        }
    }
    
    flash('error', "Thêm giỏ hàng thành công", 'product_page');
}
public function Pay(){
    $ids=$_GET['id'];
        $id=$_SESSION['auth']['id'];
        $products=$this->product->userPay($id);
        $buy=$this->product->productPay($ids);

    return $this->render('userPare.pay',compact('products','buy'));
}
public function PayPost(){
    if (isset($_POST['buy'])) {
       $iduser=$_SESSION['auth']['id'];
       $quantity=$_POST['soluong'];
       $unit_price=$_POST['gia'];
       $total_price=$_POST['tong'];
       $name_user=$_POST['tenuser'];	
       $phone=$_POST['sdt'];	
       $pickup_date=$_POST['date'];
       $payment_method=$_POST['thanhtoan'];	
       $notes=$_POST['notes'];	
       $product_id=$_GET['idpr'];	
       $Address=$_POST['address'];	
       $Color=$_POST['color']?$_POST['color']:'white';
       $this->product->addPay($iduser,$quantity,$unit_price,$total_price,$name_user,$phone,$pickup_date,$payment_method,$notes,$product_id, $Address,$Color);
       $buy=$this->product->productPay($product_id);
       $price=strval($buy->price);
       $img=json_decode($buy->images)[0];
       $cleaned_string = str_replace(['[', ']', '"'], '', $img);
       $cart_key = $product_id . '_' . $cleaned_string . '_' . $buy->name_product . '_' . $Color . '_' .$price;
       if (isset($_SESSION['cart'][$cart_key])) {
        if ($_SESSION['cart'][$cart_key] > $quantity) {
            $_SESSION['cart'][$cart_key] -= $quantity;
        } else {
            unset($_SESSION['cart'][$cart_key]);
        }
    }
    }
     flash('error', "Đặt hàng thành công", 'bill');

}
public function bill(){
    $user=$this->product->userPay($_SESSION['auth']['id']);
    return $this->render('userPare.bill',compact('user'));
}

}


?>