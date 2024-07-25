<main class="admin_user_add">
    <h2 class="tieu_de">Thêm loại bài viết</h2>
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
                <label class="tieu_de-chung" for="">Tên loại bài viết</label>
                <input class="nhap-thong_tin" name="TenLoaiBai" type="text" placeholder="Nhập loại bài viết">
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Trạng thái loại bài viết</label>
                <select name="TrangThaiLoaiBai" id="" class="form-select">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                </select>
            </div>
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Thứ tự</label>
                <input class="nhap-thong_tin" type="number" name="ThuTu">
            </div>
            <div class="xac_nhan-them">
                <button type="submit" value="submit" name="submit">Xác nhận thêm</button>
            </div>
        </div>
    </form>
</main>