 <form action="<?= BASE_URL_ADMIN . '&action=store-product'?>" method="POST" enctype="multipart/form-data">
    <!-- <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
        <input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button> -->
    <div class="mt-3 mb-3">
        <label for="" class="form-label">Tên:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mt-3 mb-3">
        <label for="" class="form-label">Danh mục:</label>
        <select name="category_id" id="" class="form-control">
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat["id"]?>"><?= $cat["name"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
        <div class="mt-3 mb-3">
        <label for="" class="form-label">Mô tả:</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="mt-3 mb-3">
        <label for="" class="form-label">Giá:</label>
        <input type="number" name="price" class="form-control">
    </div>
    <div class="mt-3 mb-3">
        <label for="" class="form-label">Số lượng:</label>
        <input type="number" name="quantity" class="form-control">
    </div>
    <div class="mt-3 mb-3">
        <label for="" class="form-label">Ảnh:</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Lưu</button>
</form>