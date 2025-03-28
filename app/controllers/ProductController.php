<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController{
    public $product;

    public function __construct(){
        $this->product = new Product();
    }
    
    public function indes(){
        $ses=$this->product->billct();
        $user=$this->product->userTotal();
        $reviews=$this->product->product_reviews();
        $product=$this->product->productTotal();
        $categories=$this->product->categoriesTotal();
        $All=$this->product->tong();
        return $this->render('product.user', compact('user','reviews','product','categories','All','ses'));
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
               
               $this->product->addProduct($_POST['product_name'],$image_paths_json,$_POST['product_title'],$_POST['product_price'],$colors_json,$_POST['product_manufacturer'],$_POST['product_seat_count'],$_POST['edit_product_move'],$_POST['product_fuel'],$_POST['product_consumption'],$_POST['product_quantity'],$_POST['product_satust']);
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
   $this->product->update_product($_POST['product_name'],$image_paths_json,$_POST['product_title'],$_POST['product_price'],$_POST['product_category'],$_POST['product_id'],$_POST['product_color'],$_POST['product_seat_count'],$_POST['product_move'],$_POST['product_consumption'],$_POST['product_fuel'],$_POST['product_idif'],$_POST['editProductQuantity'],$_POST['editProductSatust']);
   flash('success', "Sửa thành công", 'get-product');
 }
    }
    public function delete_product(){

        $this->product->deleteProduct($_POST['delete_product']);
        flash('success', "Xóa thành công", 'get-product');
    }
    public function order(){
        $order=$this->product->orderadmin();
        return $this->render('product.order',compact('order'));
    }
    public function addToCartnex(){
        return $this->render('userPare.404');
    }
    public function car_services(){
        $services=$this->product->showCreateService();
        return $this->render('product.car_services',compact('services'));
    }
    public function add_service()
{
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['status'])) {
        $name = $_POST['name'];
        $description = $_POST['description']; 
        $price = $_POST['price']; 
        $status = $_POST['status']; 
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = basename($_FILES['image']['name']);
            $url = 'imgs/';  
            $imagePath = $url . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }
        $this->product->createService($name, $description, $price, $status, $imagePath);

        flash('success', "Thêm dịch vụ thành công", 'car_services');
    }
}
public function update_order(){
    if (isset($_POST['luu'])) {
       
    
    $this->product->updateOrder($_POST['id'],  $_POST['editNameUser'],$_POST['editPhone'],$_POST['editAddress'],$_POST['editQuantity'],$_POST['editUnitPrice'],$_POST['editPaymentMethod'],$_POST['editStatus']);

}

}
public function delete_order(){
   $this->product->deleteOrder($_POST['order_id']);
   header("Location: http://renax.test/order"); 
}
public function updateService()
{
    if (isset($_POST['luu'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $img = basename($_FILES['image']['name']);
            $url = 'imgs/';
            $imagePath = $url . $img;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        } else {

            $imagePath = $_POST['images'];
        }

        $this->product->updateService($id, $name, $description, $price, $status, $imagePath);
        
        header("Location: http://renax.test/car_services"); 
    }
}

public function servise(){
    $serviceInvoices=$this->product->billcts();
    $dichvu=$this->product->showCreateService();
    return $this->render('product.servise',compact('serviceInvoices','dichvu'));
}

    public function update(){
        if (isset($_POST['luu'])) {
            $id=$_POST['id'];
            $name = $_POST['name'];
        $detail = $_POST['detail'];
        $status = $_POST['status'];
        $id_car_services = $_POST['id_car_services'];
        $time = $_POST['time'];
        $phone = $_POST['phone'];
        $this->product->suaService($id, $name, $detail, $status, $id_car_services, $time,$phone);
        
        }
header("Location: http://renax.test/service-invoice"); 
        

     
    }


// <-------------------------------------------------------->
  public function userpage(){
    $product=$this->product->userPage();
    $services=$this->product->showCreateService();
    $sql=$this->product->productshow();
     return $this->render('userPare.index',compact('product','services','sql'));
  }
  public function product_page(){
    $id = isset($_GET['id']) ? $_GET['id'] : 1;
     
    if (isset($_GET['timkiem'])) {
        $dulieu=$_GET['dulieu'];
        $product=$this->product->productPages($dulieu,$id );
    $productx=$this->product->nuts($dulieu);
        return $this->render('userPare.product',compact('product','productx'));
    }
    elseif (isset($_GET['id_loaihang'])) {
        $idlh=$_GET['id_loaihang'];
        $product=$this->product->productPagew($idlh,$id);
        $productx=$this->product->nutw($idlh);
    return $this->render('userPare.product',compact('product','productx'));
    }
    else{
        $product=$this->product->productPage($id);
        $productx=$this->product->nut();
    return $this->render('userPare.product',compact('product','productx'));
    }
    
    
  }
  public function login(){
    return $this->render('userPare.login');
  }
  public function check() {
    $product = $this->product->getuser(); 
 
    if (isset($_POST['checks'])) { 
        
        $email = $_POST['nameLogin'] ; 
        $password = $_POST['passwordLogin'] ;
        
        if ($email && $password) {
          
            $user = null;
            foreach ($product as $value) {
                if ($value->email == $email) {
                    $user = $value;
                    break;
                }
            }
    
            if ($user) {
                
                if ($password==$user->password) {
                    
                    $_SESSION['auth'] = [
                        'id' => $user->id,
                        'email' => $user->email,
                        'role' => $user->role,
                    ];
                    // flash('success', "Đăng nhập thành công!", 'userpage');
                    unset($_SESSION['login-fail-message']);
                    header("Location: http://renax.test/login"); 
                    exit();
                } else {
                    $_SESSION['login-fail-message']='Đăng nhập thất bại';
                    flash('error', "Sai mật khẩu!", 'login');
                }
            } else {
                $_SESSION['login-fail-message']='Đăng nhập thất bại';
                flash('error', "Email không tồn tại!", 'login');
            }
        } else {
            $_SESSION['login-fail-message']='Đăng nhập thất bại';
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
       header("Location: http://renax.test/detailProduct?id=".$product);

    }
}
public function cartProduct(){
    return $this->render('userPare.cart');
}
public function addToCart(){
   
    // if (!isset($_SESSION['cart'])) {
    //    $_SESSION['cart'] = [];
    // }

    if (isset($_POST['add'])) {
    
        $product_id = $_GET['id'];
        $quantity = (int)$_POST['quantity']; 
        $color = $_POST['color'];
        $images = $_POST['images']; 
        $nameProduct = $_POST['nameProduct'];
        $priceProduct = $_POST['price'];
        $id=$_SESSION['auth']['id'];

        if (isset($_SESSION['cart'][$product_id][$color][$id])) {
            $_SESSION['cart'][$product_id][$color]['quantity'] += $quantity;
        } else {
  
            $_SESSION['cart'][$product_id][$color][$id] = [
                'name' => $nameProduct,
                'price' => $priceProduct,
                'images' => $images, 
                'quantity' => $quantity
            ];
        }
    }

    // Thông báo thêm vào giỏ hàng thành công
    flash('error', "Thêm giỏ hàng thành công", 'cart');
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
       $cart_key = $product_id . '_' . $Color . '_' . $_SESSION['auth']['id'] ;
       if (isset($_SESSION['cart'][$cart_key])) {
        if ($_SESSION['cart'][$cart_key] > $quantity) {
            $_SESSION['cart'][$cart_key] -= $quantity;
        } else {
            unset($_SESSION['cart'][$product_id][$Color][$_SESSION['auth']['id']]);
        }
    }
    $product=$this->product->productPay($product_id);
    $tong=$product->quantity-$quantity;
   $this->product->updateQuantity($product_id,$tong);
    }
     flash('error', "Đặt hàng thành công", 'bill');

}
public function bill(){
    $services=$this->product->servisePage($_SESSION['auth']['id']);
    $bill=$this->product->bills($_SESSION['auth']['id']);
    $user=$this->product->userPay($_SESSION['auth']['id']);
    return $this->render('userPare.bill',compact('user','bill','services'));
}
public function register(){
    return $this->render('userPare.dangky');
}
public function adduser(){
    $user=$this->product->getuser();
    if (isset($_POST['dangky'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        foreach ($user as $value) {
            if ($value->email==$email && $value->password==$password) {
                $_SESSION['off']='thatbai';
                header("Location: http://renax.test/register?name=0");
            }
        }
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $img=basename($_FILES['profile_image']['name']);
        $url = 'imgs/';  
        $noi=$url.$img;
        move_uploaded_file($_FILES['profile_image']['tmp_name'],$noi);
        $this->product->dangKy($name,  $email, $password, $address, $phone, $date_of_birth, $gender, $noi);
        unset($_SESSION['off']);
        $_SESSION['on']='thanhcong';
        flash('error', "Đăng ký thành công", 'register');
    }
}
public function dangxuat(){
    unset($_SESSION['auth']);
    flash('success', "Xóa thành công", '/');
}
public function error(){
    return $this->render('404');
}
public function removeFromCart(){
    $id=$_GET['id'];
    $color=trim($_GET['color'], "");
    unset($_SESSION['cart'][$id][$color][$_SESSION['auth']['id']]);
    flash('success', "Xóa thành công", 'cart');
}
public function post(){
    $post=$this->product->showpost();
    return $this->render('product.post',compact('post'));
}
public function addpost(){
    if (isset($_POST['luu'])) {
        
       $img=basename($_FILES['images']['name']);
       $url = 'imgs/';  
        $noi=$url.$img;
       var_dump($noi);
       move_uploaded_file($_FILES['images']['tmp_name'],$noi);
      $this->product->posts($noi,$_POST['content'],$_POST['title']);
       header("Location: http://renax.test/post");
    }
}
public function delete_post(){
    
    $this->product->postDelete($_POST['delete_post']);
    header("Location: http://renax.test/post");
}
public function mainPost(){
   $post= $this->product->showpost();
    return $this->render('userPare.pos',compact('post'));
}
public function post_detail(){
    $post= $this->product->showpost();
    $sql=$this->product->showpost_detail();
    return $this->render('userPare.post_detail',compact('post','sql'));
}
public function service(){
    $services=$this->product->showCreateService();
    return $this->render('userPare.service',compact('services'));
}
public function serviceDetail(){
    $post= $this->product->showCreateService();
    $sql=$this->product->servicesDetail($_GET['id']);
    return $this->render('userPare.service_detail',compact('sql','post'));
}
public function form_data() {
        

    if (isset($_POST['datlich'])) {
      
        $name = $_POST['name'];  
        $phone = $_POST['phone']; 
        $product_id = $_POST['product']; 
        $service_id = $_POST['service']; 
        $service_date = $_POST['service_date'];
        $notes = $_POST['notes'];

       
        $this->product->process_form($name, $phone, $product_id, $service_id, $service_date, $notes);
        
        header("Location: http://renax.test//");
        
    }
}
public function aubost(){
    return $this->render('userPare.aubost');
}


}
?>