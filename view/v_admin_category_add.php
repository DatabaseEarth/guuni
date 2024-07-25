<main class="admin_user_add">
    <h2 class="tieu_de">Thêm danh mục</h2>
    <?php if(isset($_SESSION['loi'])): ?>
        <div class="loi-chung">
            <?=$_SESSION['loi']?>
        </div>
    <?php endif; unset($_SESSION['loi']) ?>
    <?php if(isset($_SESSION['thongbao'])): ?>
        <div class="thongbao-chung">
            <?=$_SESSION['thongbao']?>
        </div>
    <?php endif; unset($_SESSION['thongbao']) ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="khung-3">
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Tên danh mục</label>
                <input class="nhap-thong_tin" name="TenDanhMuc" type="text" placeholder="Nhập Tên danh mục">
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Hình ảnh</label>
                <input class="nhap-thong_tin" name="AnhDanhMuc" type="file">
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Mô tả</label>
                <textarea type="text" name="MoTaNgan" class="" placeholder="Nhập mô tả sản phẩm" style="padding: 20px; border: 1px solid #d5d5d5"></textarea>
            </div>
            <div class="xac_nhan-them">
                <button type="submit" value="submit" name="submit">Xác nhận thêm</button>
            </div>
        </div>
    </form>
</main>