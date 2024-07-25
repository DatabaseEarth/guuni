<main class="admin_user_add">
    <h2 class="tieu_de">Sửa Tài khoản</h2>
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
        <div class="khung-1-2">
            <div class="khung-1">
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Email</label>
                    <input class="nhap-thong_tin" name="Email" type="email" placeholder="Nhập Email" value="<?=$CTtk['Email']?>">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Số điện thoại</label>
                    <input class="nhap-thong_tin" name="SoDienThoai" type="number" placeholder="Nhập số điện thoại" value="<?=$CTtk['SoDienThoai']?>">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Mật khẩu</label>
                    <input class="nhap-thong_tin" name="MatKhau" type="text" placeholder="Nhập Mật khẩu" value="<?=$CTtk['MatKhau']?>">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Địa chỉ</label>
                    <input class="nhap-thong_tin" name="DiaChi" type="text" placeholder="Nhập địa chỉ" value="<?=$CTtk['DiaChi']?>">
                </div>
            </div>
            <div class="khung-2">
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Hình đại diện</label>
                    <input type="file" name="HinhAnhTK" id="">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Giới tính</label>
                    <select class="form-select" name="GioiTinh" id="">
                        <option value="0" <?= ($CTtk['GioiTinh']==0)?'selected':''?>>Nữ</option>
                        <option value="1" <?= ($CTtk['GioiTinh']==1)?'selected':''?>>Nam</option>
                        <option value="2" <?= ($CTtk['GioiTinh']==2)?'selected':''?>>Khác</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Quyền</label>
                    <select class="form-select" name="Quyen" id="">
                        <option value="0" <?= ($CTtk['Quyen']==0)?'selected':''?>>Khách hàng</option>
                        <option value="1" <?= ($CTtk['Quyen']==1)?'selected':''?>>Quản lý</option>
                    </select>
                </div>
                <div class="xac_nhan-them">
                    <button type="submit" value="submit" name="submit">Xác nhận sửa</button>
                </div>
            </div>
        </div>
    </form>
</main>