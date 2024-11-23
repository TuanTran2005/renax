<?php
namespace App\Models;

class Product extends BaseModel{
    protected $table = "user";
    protected $loaihang="categories";
    public function getProduct(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getcategories(){
        $sql = "SELECT * FROM $this->loaihang";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProduct($id, $ten, $gia){
        $sql = "INSERT INTO $this->table VALUES (?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(options: [$id, $ten, $gia]);
        switch ($variable) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
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