<?php
namespace App\Models;

class Product extends BaseModel{
    protected $loaihang="categories";
    protected $sanpham="product";
    protected $user="user";
    protected $review="product_reviews";
    protected $chitietsanpham="product-information";
    protected $binhluan='product_reviews';
    protected $dichvu='servise';
    protected $billct='order_details';
    protected $order='order';
    protected $post='post';
    protected $servise='servise';
    protected $car_services='car_services';
    public function getuser(){
        $sql = "SELECT * FROM $this->user ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getcategories(){
        $sql = "SELECT * FROM $this->loaihang";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getProduct() {
        
        $sql = "SELECT product.*,`product-information`.*,   product.id AS id_pr, `product-information`.id AS id_if  FROM $this->sanpham  INNER JOIN `$this->chitietsanpham` ON $this->sanpham.id = `$this->chitietsanpham`.product_id";
        
       
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
      public function addProduct($product_name, $product_image,$product_title,$product_price, $product_color, $product_manufacturer, $product_seat_count,$edit_product_move, $product_fuel,$product_consumption,$product_quantity,$product_satust){
        $sql = "INSERT INTO `$this->sanpham` (name_product, images, title, price, category_id, quantity, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $this->setQuery($sql);
        $this->execute([$product_name,$product_image,$product_title,$product_price, $product_manufacturer,$product_quantity,$product_satust]);
        $idfk=$this->pdo->lastInsertId();
        $sqll = "INSERT INTO `$this->chitietsanpham`(product_id, color, seat_number, move, consumption, fuel) VALUES (?, ?, ?, ?, ?, ?)";
        $this->setQuery($sqll);
        $this->execute([$idfk, $product_color, $product_seat_count, $edit_product_move, $product_consumption, $product_fuel]);
       
    }
    public function category($tenlh,$mt){
        $sql="INSERT INTO `$this->loaihang`(name_category, `describe`) VALUES (?,?)";
        $this->setQuery($sql);
        $this->execute([$tenlh,$mt]);
    }
    public function updatecate($ten,$mt,$id){
        $sql="UPDATE $this->loaihang SET name_category= ? ,`describe`= ? WHERE id = ? ";
        $this->setQuery($sql);
        return $this->execute([$ten,$mt,$id]);
    }
    public function delete_cartegorr($id) {
        $sql = "DELETE FROM $this->loaihang WHERE id=?";
        $this->setQuery($sql);
        $this->execute([$id]);
       
    }
    public function updateUser($id,$name,$images,$pass,$address,$phone,$email,$date,$status,$gender,$role){
        $sql="UPDATE $this->user  SET `name`= ? ,images= ? ,`password`= ? ,addpress= ? ,phone= ? ,email= ? ,`date`= ? ,`status`= ? ,gender= ? ,`role`= ? WHERE id=? ";
        $this->setQuery($sql);
        $this->execute([$name,$images,$pass,$address,$phone,$email,$date,$status,$gender,$role,$id]);
    }
    public function deleteUser($id){
        $sql = "DELETE FROM $this->user WHERE id=?";
        $this->setQuery($sql);
        $this->execute([$id]);
    }
    public function update_product($name_product,$images,$title,$price,$category_id,$idpk,$color,$seat_number,$move,$consumption,$fuel,$idif,$quantity,$status){
        $sql= "UPDATE product SET name_product= ? ,images= ? ,title= ? ,price= ? ,category_id= ? , quantity = ? ,`status`= ? WHERE id= ?";
        $this->setQuery($sql);
        $this->execute([$name_product,$images,$title,$price,$category_id,$quantity,$status,$idpk]);
        $sqlx= "UPDATE `product-information` SET color= ? ,seat_number= ? ,`move`= ? ,consumption= ? ,fuel= ? WHERE id= ?";
        $this->setQuery($sqlx);
        $this->execute([$color,$seat_number,$move,$consumption,$fuel,$idif]);
    }
    public function deleteProduct($id){ 
        $sqlx ="DELETE FROM `$this->chitietsanpham`  WHERE `$this->chitietsanpham`.product_id= ?";
        $this->setQuery($sqlx);
        $this->execute([$id]);
        $sql ="DELETE FROM $this->sanpham  WHERE $this->sanpham.id= ?";
        $this->setQuery($sql);
        $this->execute([$id]);
       
    }
    public function userTotal(){
        $sql = "SELECT COUNT(*) AS total FROM $this->user";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function product_reviews(){
        $sql = "SELECT COUNT(*) AS total FROM $this->review";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function productTotal(){
        $sql = "SELECT COUNT(*) AS total FROM $this->sanpham";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function categoriesTotal(){
        $sql = "SELECT COUNT(*) AS total FROM $this->loaihang";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function userPage(){
        $sql = "SELECT * FROM $this->sanpham ORDER BY price DESC LIMIT 5";
        $this->setQuery($sql);
       return $this->loadAllRows();

    }
    public function productPage($page=1){
       
 $limit = 6;


 $offset = ($page - 1) * $limit;
        $sql="SELECT * FROM $this->sanpham ORDER BY id ASC LIMIT $limit OFFSET $offset ";

        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function productPages($ser, $page = 1) {
        $limit = 6;
        $offset = ($page - 1) * $limit;
        
        // Câu truy vấn với điều kiện tìm kiếm
        $sql = "SELECT * FROM $this->sanpham WHERE name_product LIKE ? ORDER BY id ASC LIMIT $limit OFFSET $offset";
        
        // Thiết lập truy vấn
        $this->setQuery($sql);
        
        // Truyền tham số tìm kiếm vào câu lệnh
        return $this->loadAllRows(['%' . $ser . '%']);
    }
    public function tong(): mixed{
     $sql="SELECT * FROM `$this->order` INNER JOIN `$this->billct` ON `$this->order`.id=`$this->billct`.order_id ";
     $this->setQuery($sql);
     return $this->loadAllRows([]);
    }
    public function updateOrder($id, $name,$phone,$address,$quantity,$unitPrice,$paymentMethod,$status){
        $cccp="UPDATE `order_details` SET name_user= ? , phone= ? , `Address`= ? ,  payment_method= ? , `status` = ? WHERE 	order_id= ?";
       $this->setQuery($cccp);
       $this->execute([$name,$phone,$address,$paymentMethod,$status,$id-1]);
       $sql="UPDATE `$this->order` SET 	quantity= ? , unit_price= ? , 	total_price= ?  WHERE id= ?";
       $this->setQuery($sql);
       $total_price=$quantity*$unitPrice;
       $this->execute([$quantity,$unitPrice, $total_price,$id]);
       header("Location: http://renax.test/order"); 
    }
    public function updateService($id, $name, $description, $price, $status, $image)
{
    
    $cccp = "UPDATE $this->car_services SET `name` = ?, `description` = ?, `price` = ?, `status` = ?, `image` = ? WHERE `id` = ?";
   
    $this->setQuery($cccp);
    $this->execute([$name, $description, $price, $status, $image, $id]);
    
    
    
}
public function suaService($id, $name, $detail, $status, $id_car_services, $time,$phone)
{
    
    $cccp = "UPDATE $this->servise SET `name` = ?, `detail` = ?, `status` = ?, `id_car_services` = ?, `time` = ?, `phone` = ? WHERE `id` = ?";
    $this->setQuery($cccp);
    $this->execute([$name, $detail, $status, $id_car_services, $time, $phone, $id]);
    
    
    
}
public function delete_service_invoice(){
    $sql="DELETE FROM $this->servise WHERE id= ?";
    $this->setQuery($sql);
    $this->execute([$_POST['invoice_id']]);
    header("Location: http://renax.test/service-invoice"); 
}
    // <--------------------------------------------------->
    public function nut(){
        $limit = 6;
        $sql_count = "SELECT COUNT(*) AS total FROM $this->sanpham ";
        $this->setQuery($sql_count);
        $totalRecords = $this->loadAllRows(); 
        $totalRecords = $totalRecords[0]->total; 
        $totalPages = ceil($totalRecords / $limit); 
        return $totalPages;
    }
    public function nuts($dulieu){
        $limit = 6;
        $sql_count = "SELECT COUNT(*) AS total FROM $this->sanpham WHERE name_product LIKE ?";
        $this->setQuery($sql_count);
        $totalRecords = $this->loadAllRows(['%' . $dulieu . '%']); 
        $totalRecords = $totalRecords[0]->total; 
        $totalPages = ceil($totalRecords / $limit); 
        return $totalPages;
    }
    public function detail_Product($id) {
        // Xây dựng câu lệnh SQL
        $sql = "SELECT product.*,`product-information`.*,   product.id AS id_pr, `product-information`.id AS id_if FROM $this->sanpham 
        INNER JOIN `$this->chitietsanpham` 
        ON $this->sanpham.id = `$this->chitietsanpham`.id 
        WHERE $this->sanpham.id = ?";

// Gọi phương thức setQuery để chuẩn bị câu lệnh SQL
$this->setQuery($sql);

// Gọi phương thức loadRow để thực thi câu lệnh và trả về 1 hàng dữ liệu
return $this->loadRow([$id]);
      
    }
 public function danhgia($product,$user,$grant,$review){
    $sql="INSERT INTO $this->binhluan(product_id,user_id,rating,review	) VALUES (?,?,?,?)";
    $this->setQuery($sql);
    $this->execute([$product,$user,$grant,$review]);
 }
 public function review($id){
    $sql = "SELECT *  FROM $this->user  INNER JOIN $this->binhluan ON $this->user.id = $this->binhluan.user_id WHERE $this->binhluan.product_id= ?  " ;
    $this->setQuery($sql);
    return $this->loadAllRows([$id]);
     
 }
 public function userPagex(){
    $sql = "SELECT * FROM $this->sanpham ORDER BY price DESC LIMIT 4";
    $this->setQuery($sql);
   return $this->loadAllRows();

} 
public function servise($id){
 $sql="SELECT * FROM $this->dichvu WHERE product_id= ? ";
 $this->setQuery($sql);
 return $this->loadAllRows([$id]);
}
  public function userPay($id){
   $sql="SELECT * FROM $this->user WHERE id= ?";
   $this->setQuery($sql);
   return $this->loadRow([$id]);
  }
  public function productPay($id){
    $sql="SELECT * FROM $this->sanpham WHERE id= ?";
    $this->setQuery($sql);
    return $this->loadRow([$id]);
   }
   public function addPay($iduser,$quantity,$unit_price,$total_price,$name_user,$phone,$pickup_date,$payment_method,$notes,$product_id, $Address,$Color){
    // Insert vào bảng orders
$sql = "INSERT INTO `order` (user_id, quantity, unit_price, total_price) VALUES (?, ?, ?, ?)";

$this->setQuery($sql);
$this->execute([$iduser, $quantity, $unit_price, $total_price]);

// Lấy ID của bản ghi vừa chèn vào bảng orders (ID tự động tăng)
$idfk = $this->pdo->lastInsertId();
$status='Chờ Xử Lý';
// Insert vào bảng order_details
$sql = "INSERT INTO `order_details` (name_user, phone, pickup_date, payment_method, notes, order_id, product_id, `address`, color, `status`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$this->setQuery($sql);
$this->execute([$name_user, $phone, $pickup_date, $payment_method, $notes, $idfk, $product_id, $Address, $Color, $status]);


   }
   public function dangKy($name,  $email, $hashed_password, $address, $phone, $date_of_birth, $gender, $profile_image){
    $sql = "INSERT INTO user(`name`,  email, `password`, `addpress`, phone, `date`, `status`, gender, images) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $this->setQuery($sql);
    $this->execute([$name,  $email, $hashed_password, $address, $phone, $date_of_birth, true , $gender, $profile_image]);
   }
   public function orderadmin(){
    $sql="SELECT * FROM `$this->order` INNER JOIN $this->billct ON `$this->order`.id=$this->billct.order_details_id ";
    $this->setQuery($sql);
   return $this->loadAllRows();
   }
   public function bills($id){
    $sql = "SELECT 
    `$this->order`.*, 
    $this->billct.*, 
    $this->sanpham.*, 
    $this->sanpham.quantity AS sanpham_quantity,
    $this->order.quantity AS order_quantity,
    $this->billct.`status` AS billct_status, 
    $this->sanpham.`status` AS sanpham_status 
FROM 
    `$this->order` 
INNER JOIN 
    $this->billct ON `$this->order`.id = $this->billct.order_details_id 
INNER JOIN 
    $this->sanpham ON $this->sanpham.id = $this->billct.product_id 
WHERE 
    `$this->order`.user_id = ?";

    $this->setQuery($sql);
    return $this->loadAllRows([$id]);
   }
   public function posts($img,$content,$title){
    $sql = "INSERT INTO $this->post(`title`,`images`, `content`, `user_id`) VALUES (?,?, ?, ?)";
    $this->setQuery($sql);
    $this->execute([$title,$img,$content,$_SESSION['auth']['id']]);
   }
   public function showpost(){
    $sql="SELECT * FROM $this->post ";
    $this->setQuery($sql);
    return $this->loadAllRows();
   }
   public function showpost_detail(){
    $sql="SELECT * FROM $this->post WHERE id= ?";
    $this->setQuery($sql);
    return $this->loadRow([$_GET['id']]);
   }
   public function postDelete($id){
   $sql="DELETE FROM $this->post WHERE id= ?";
   $this->setQuery($sql);
   $this->execute([$id]);
   }
   public function createService($name, $description, $price, $status, $image)
{
    // Insert dữ liệu vào bảng 'services'
    $stmt = "INSERT INTO car_services(`name`, `description`,`price`, `status`,`image`) VALUES (?, ?, ?, ?, ?)";
$this->setQuery($stmt);
    $this->execute([$name, $description, $price, $status, $image]);
}
public function showCreateService(){
    $sql="SELECT * FROM car_services";
    $this->setQuery($sql);
    return $this->loadAllRows();
}
public function servicesDetail($id){
    $sql="SELECT * FROM car_services WHERE id=?";
    $this->setQuery($sql);
    return $this->loadRow([$id]);
}
public function process_form($name, $phone, $product_id, $service_id, $service_date, $notes){
   
        $user_id=$_SESSION['auth']['id'];
    $sql = "INSERT INTO servise(`name`, detail, `status`, product_id, user_id, id_car_services, `time`, phone) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $this->setQuery($sql); 
    $this->execute([$name,$notes,'Đang xử ký', $product_id, $user_id, $service_id, $service_date,$phone]);
}
public function productshow(){
    $sql="SELECT * FROM $this->sanpham";
    $this->setQuery($sql);
    return $this->loadAllRows();
}
public function servisePage($id) {
    $sql = "SELECT $this->servise.name AS service_name,`car_services`.name AS car_name, $this->servise.*, car_services.* FROM  $this->servise INNER JOIN 
    car_services ON   $this->servise.id_car_services = car_services.id  WHERE user_id = ?";

    $this->setQuery($sql);
    return $this->loadAllRows([$id]);
}
public function deleteOrder($id) {
        $sqk="DELETE FROM `$this->billct` WHERE order_id = ?";
    $this->setQuery($sqk);
    $this->execute([$id]);
    $sql = "DELETE FROM `$this->order` WHERE id = ?";
    $this->setQuery($sql);  
    $this->execute([$id]);

}
public function hoanthanh(){
    $sql="UPDATE $this->billct SET `status` = ? WHERE order_details_id= ?";
    $this->setQuery($sql);
    $sua='Thành công';
    $id=$_GET['id'];
    $this->execute([$sua,$id]);
    header("Location: http://renax.test/bill"); 
}
public function billct (){
    $sql = "SELECT $this->servise.name AS service_name,`car_services`.name AS car_name, $this->servise.*, car_services.* FROM  $this->servise INNER JOIN 
    car_services ON   $this->servise.id_car_services = car_services.id";

    $this->setQuery($sql);
    return $this->loadAllRows();
}
public function billcts() {
    $sql = "SELECT 
    $this->servise.name AS service_name, 
    car_services.name AS car_name, 
    user.name AS user_name, 
    $this->servise.status AS service_status, 
    car_services.status AS car_service_status, 
    user.status AS user_status,  
    $this->servise.id AS service_id, 
    car_services.id AS car_service_id, 
    user.id AS user_id, 
    $this->servise.*, 
    car_services.*, 
    user.* 
FROM 
    $this->servise
INNER JOIN 
    car_services ON $this->servise.id_car_services = car_services.id
INNER JOIN 
    user ON $this->servise.user_id = user.id";


    $this->setQuery($sql);
    return $this->loadAllRows();
}

public function productPagew($idlh,$page=1){
    $limit = 6;
    $offset = ($page - 1) * $limit;
    
    // Câu truy vấn với điều kiện tìm kiếm
    $sql = "SELECT * FROM $this->sanpham WHERE category_id = ? ORDER BY id ASC LIMIT $limit OFFSET $offset";
    
    // Thiết lập truy vấn
    $this->setQuery($sql);
    
    // Truyền tham số tìm kiếm vào câu lệnh
    return $this->loadAllRows([$idlh]);
}
public function nutw($dulieu){
    $limit = 6;
    $sql_count = "SELECT COUNT(*) AS total FROM $this->sanpham WHERE category_id = ?";
    $this->setQuery($sql_count);
    $totalRecords = $this->loadAllRows([$dulieu]); 
    $totalRecords = $totalRecords[0]->total; 
    $totalPages = ceil($totalRecords / $limit); 
    return $totalPages;
}
public function deleteCar_services(){
    $id=$_GET['id'];
    $sql="DELETE FROM $this->car_services WHERE id = ?";
    $this->setQuery($sql);
    $this->execute([$id]);
    $sqls="DELETE FROM $this->servise WHERE id_car_services = ?";
    $this->setQuery($sqls);
    $this->execute([$id]);
    header("Location: http://renax.test/car_services"); 
}
public function updateQuantity($id,$soluong){
   $sql="UPDATE $this->sanpham SET quantity = ?, `status` = ? WHERE id=?";
$this->setQuery($sql);
if ($soluong>0) {
    $status="still";
}else{
    $status="hidden";
}
$this->execute([$soluong,$status,$id]);
}
}
?>