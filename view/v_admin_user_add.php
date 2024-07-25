<main class="admin_user_add">
    <h2 class="tieu_de">Thêm Tài khoản</h2>
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
                    <input class="nhap-thong_tin" name="Email" type="email" placeholder="Nhập Email">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Số điện thoại</label>
                    <input class="nhap-thong_tin" name="SoDienThoai" type="number" placeholder="Nhập số điện thoại">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Mật khẩu</label>
                    <input class="nhap-thong_tin" name="MatKhau" type="text" placeholder="Nhập Mật khẩu">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Địa chỉ</label>
                    <input class="nhap-thong_tin" name="DiaChi" type="text" placeholder="Nhập địa chỉ">
                </div>
            </div>
            <div class="khung-2">
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Hình đại diện</label>
                    Lấy ảnh mặc định - chỉnh sửa để thay đổi ảnh đại diện
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Giới tính</label>
                    <select class="form-select" name="GioiTinh" id="">
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Quyền</label>
                    <select class="form-select" name="Quyen" id="">
                        <option value="0" selected>Khách hàng</option>
                        <option value="1">Quản lý</option>
                    </select>
                </div>
                <div class="xac_nhan-them">
                    <button type="submit" value="submit" name="submit">Xác nhận thêm</button>
                </div>
            </div>
        </div>
        
    </form>
</main>