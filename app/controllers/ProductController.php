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
    $id=$_GET['id'];
    $product=$this->product->productPage($id);
    $productx=$this->product->nut();
    return $this->render('userPare.product',compact('product','productx'));
  }
  public function login(){
    return $this->render('userPare.login');
  }
  public function checkUser() {
    $product = $this->product->getuser();
    if (isset($_POST['check'])) { // Kiểm tra xem có form được gửi không
        foreach ($product as $value) {
            // Kiểm tra tên đăng nhập và mật khẩu
            if ($_POST['nameLogin'] == $value->email && $_POST['passwordLogin'] == $value->password) {
                // Lưu thông tin vào session
                $_SESSION['auth'] = [
                    'id' => $value->id,
                    'email' => $value->email,
                    'role' => $value->role,
                ];
                // Gọi hàm flash để thông báo thành công (nếu có)
                flash('success', "Thành công", 'userpage');
                
                // Chuyển hướng tới trang chủ (hoặc trang đích sau khi đăng nhập)
                header("Location: http://renax.test/userpage"); // Bạn có thể thay "/userpage" bằng URL bạn muốn chuyển hướng đến
                exit(); // Sau khi chuyển hướng, cần dừng mọi thao tác tiếp theo
            } else {
                // Nếu không thành công, thông báo thất bại
                flash('error', "Thất Bại", 'login');
            }
        }
    }
}
public function detailProduct(){
    $id=$_GET['id'];

    $product=$this->product->detail_Product($id);
    return $this->render('userPare.detail_Product',compact('product'));
}
}


?>