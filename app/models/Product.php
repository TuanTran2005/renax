<?php
namespace App\Models;

class Product extends BaseModel{
    protected $table = "user";
    protected $loaihang="categories";
    protected $sanpham="product";
    protected $chitietsanpham="product-information";
    public function getuser(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getcategories(){
        $sql = "SELECT * FROM $this->loaihang";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getProduct() {
        // Sử dụng JOIN để kết hợp 2 bảng
        $sql = "SELECT * FROM $this->sanpham 
        INNER JOIN `$this->chitietsanpham` 
        ON $this->sanpham.id = `$this->chitietsanpham`.product_id";
        
        // Đặt câu truy vấn và thực thi
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
    // <--------------------------------------------------->
  
    public function idProduct($id){
     $sql="SELECT * FROM $this->table Where id=?";
     $this->setQuery($sql);
     return $this->loadRow([$id]);
    }
    public function idUpdate($id,$ten,$gia){
    $sql="UPDATE $this->table SET ten= ? , gia= ? WHERE id = ?";
    $this->setQuery($sql);
    return $this->execute(options:[$ten,$gia,$id]);
    }
    public function idDelete($id){
        $sql="DELETE FROM $this->table WHERE id = ? ";
        $this->setQuery($sql);
        return $this->execute(options:[$id]);
    }
}


?>