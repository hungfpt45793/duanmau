<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class Product extends BaseModel
{
    public function getAll() {
        $sql = "SELECT p.*, c.name cat_name FROM `products` 
            as p JOIN categories as c ON p.category_id = c.id
            ORDER BY p.id DESC;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Hàm xóa dữ liệu
    public function delete($id) {
        $sql = "DELETE FROM products WHERE `products`.`id` = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    // Hàm tìm bằng id
    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $stms = $this->pdo->prepare($sql);
        $stms->execute();
        return $stms->fetch();
    }

    // Hàm thêm dữ liệu
    public function insert($data) {
        // C1: 
        // $sql = "INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `quantity`, `img`) 
        // VALUES (NULL, ':category_id', ':name', ':description', ':price', ':quantity', ':image');";
        // $stms = $this->pdo->prepare($sql);
        // // bind dữ liệu vào tham số
        // $stms->bindParam(":category_id", $data["category_id"]);
        // $stms->bindParam(":name", $data["name"]);
        // $stms->bindParam(":description", $data["description"]);
        // $stms->bindParam(":price", $data["price"]);
        // $stms->bindParam(":quantity", $data["quantity"]);
        // $stms->bindParam(":image", $data["image"]);
        // C2: 
        $sql = "INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `quantity`, `img`) 
        VALUES (NULL, '".$data["category_id"]."', '".$data["name"]."', '".$data["description"]."', 
        '".$data["price"]."', '".$data["quantity"]."', '".$data["image"]."');";
        $stms = $this->pdo->prepare($sql);
        $stms->execute();
    }

    public function top4Lastest() {
        $sql = "SELECT * FROM products ORDER BY ID DESC LIMIT 4";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateViewCount($view_count, $id) {
        $sql= "UPDATE products SET view_count= $view_count WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function top4View() {
        $sql = "SELECT * FROM products ORDER BY view_count DESC LIMIT 4";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
