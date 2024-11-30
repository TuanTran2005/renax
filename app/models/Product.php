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
      public function addProduct($product_name, $product_image,$product_title,$product_price, $product_color, $product_manufacturer, $product_seat_count,$edit_product_move, $product_fuel,$product_consumption){
        $sql = "INSERT INTO `$this->sanpham` (name_product, images, title, price, category_id) VALUES (?, ?, ?, ?, ?)";;
        
        $this->setQuery($sql);
        $this->execute([$product_name,$product_image,$product_title,$product_price, $product_manufacturer]);
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
    public function update_product($name_product,$images,$title,$price,$category_id,$idpk,$color,$seat_number,$move,$consumption,$fuel,$idif){
        $sql= "UPDATE product SET name_product= ? ,images= ? ,title= ? ,price= ? ,category_id= ? WHERE id= ?";
        $this->setQuery($sql);
        $this->execute([$name_product,$images,$title,$price,$category_id,$idpk]);
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
    // <--------------------------------------------------->
    public function nut(){
        $limit = 6;
        
        // Truy vấn để đếm tổng số bản ghi
        $sql_count = "SELECT COUNT(*) AS total FROM $this->sanpham";
        $this->setQuery($sql_count);
        $totalRecords = $this->loadAllRows(); // Trả về mảng đối tượng stdClass
        
        // Lấy tổng số bản ghi từ đối tượng (không phải mảng)
        $totalRecords = $totalRecords[0]->total; // Truy cập bằng cú pháp đối tượng
    
        // Tính số trang
        $totalPages = ceil($totalRecords / $limit); // Tính số trang
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
    
}
   


?>