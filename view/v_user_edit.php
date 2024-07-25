<div class="user_edit">
    <div class="container">
        <?php if(isset($_SESSION['loi'])): ?>
            <div class="loi">
                <?=$_SESSION['loi']?>
            </div>
        <?php endif; unset($_SESSION['loi']); ?>
        <?php if(isset($_SESSION['thongbao'])): ?>
            <div class="thongbao">
                <?=$_SESSION['thongbao']?>
            </div>
        <?php endif; unset($_SESSION['thongbao']); ?>
    </div>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="khung-1">
                <div class="khung-nhap-thong_tin">
                    <label for="">Tên tài khoản</label>
                    <input type="text" name="TenTK" placeholder="Mời nhập tên tài khoản" value="<?=$CTtk['TenTK']?>">
                </div>
                <div class="khung-nhap-thong_tin">
                    <label for="">Email</label>
                    <input type="email" name="Email" placeholder="Mời nhập email" value="<?=$CTtk['Email']?>">
                </div>
                <div class="khung-nhap-thong_tin">
                    <label for="">Số điện thoại</label>
                    <input type="number" name="SoDienThoai" placeholder="Mời nhập số điện thoại" value="<?=$CTtk['SoDienThoai']?>">
                </div>
                <div class="khung-nhap-thong_tin">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="MatKhau" placeholder="Mời nhập Mật khẩu" value="<?=$CTtk['MatKhau']?>">
                </div>
            </div>
            <div class="khung-1">
                <div class="khung-anh">
                    <div class="anh">
                        <img src="<?=$base_url?>upload/avatar/<?=$CTtk['HinhAnhTK']?>" alt="">
                    </div>
                    <div class="thong_tin">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="HinhAnhTK">
                    </div>
                </div>
                <div class="khung-nhap-thong_tin">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="DiaChi" placeholder="Mời nhập Mật khẩu" value="<?=$CTtk['DiaChi']?>">
                </div>
                <div class="khung-nhap-thong_tin">
                    <label for="">Giới tính</label>
                    <select name="GioiTinh" id="">
                        <option value="0" <?= ($CTtk['GioiTinh']==0)?'selected':''?>>Nữ</option>
                        <option value="1" <?= ($CTtk['GioiTinh']==1)?'selected':''?>>Nam</option>
                        <option value="2" <?= ($CTtk['GioiTinh']==2)?'selected':''?>>Khác</option>
                    </select>
                </div>
                <div class="submit">
                    <button type="submit" name="submit">Sửa tài khoản</button>
                </div>
            </div>
        </form>
    </div>
</div>