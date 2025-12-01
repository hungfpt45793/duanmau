<?php 
    class DetailProductController {

        private $productModel;

        public function __construct() {
            $this->productModel = new Product();
        }

        public function show() {
            $view = 'detail_product';
            $title = 'Chi tiết sản phẩm';
            try {
                if(!isset($_GET["id"])) {
                    throw new Exception("Không tồn tại tham số ID");
                }
                $id = $_GET["id"];
                // Lấy thông tin chi tiết của sản phẩm
                $pro = $this->productModel->find($id);
                if(empty($pro)) {
                    throw new Exception("Không tồn tại Sản phẩm với ID = $id");
                }

                // Thực hiện cập nhập view_count
                $view_count = $pro["view_count"] + 1;
                // Gọi CSDL cập nhật view_count
                $this->productModel->updateViewCount($view_count, $id);

            } catch (Exception $ex) {
                throw new Exception("Thao tác xảy ra lỗi");
            }
            require_once PATH_VIEW_CLIENT_MAIN;
        }
    }
?>