<main class="admin_user_add">
    <h2 class="tieu_de">Sửa danh mục</h2>
    
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
                <input class="nhap-thong_tin" name="TenDanhMuc" type="text" value="<?=$CTdm['TenDanhMuc']?>">
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Hình ảnh</label>
                <input class="nhap-thong_tin" name="AnhDanhMuc" type="file" value="<?=$CTdm['HinhAnh']?>" >
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Mô tả</label>
                <textarea type="text" name="MoTaNgan" class="" placeholder="Nhập mô tả danh mục" style="padding: 20px; border: 1px solid #d5d5d5" value="<?=$CTdm['MoTaNgan']?>"></textarea>
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Trang Thái</label>
                <select name="TrangThai" id="" class="form-select">
                    <option value="0" <?= ($CTdm['TrangThai']==0)?'selected':''?>>Ẩn</option>
                    <option value="1" <?= ($CTdm['TrangThai']==1)?'selected':''?>>Hiện</option>
                </select>
            </div>
            <div class="xac_nhan-them">
                <button type="submit" value="submit" name="submit">Xác nhận sửa</button>
            </div>
        </div>
    </form>
</main>