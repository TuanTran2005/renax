<?php
namespace App\Models;

class Product extends BaseModel{
    protected $table = "user";
    protected $loaihang="categories";
    protected $sanpham="product";
    protected $user="user";
    protected $chitietsanpham="product-information";
    public function getuser(){
        $sql = "SELECT * FROM $this->table ";
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
    // <--------------------------------------------------->

}


?>