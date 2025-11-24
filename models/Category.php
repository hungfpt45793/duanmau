<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class Category extends BaseModel
{
    public function getAll() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>