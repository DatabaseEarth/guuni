<div class="user_login">
    <section class="login container">
        <form action="" method="post">
            <h3>ĐĂNG KÝ</h3>
            <?php if(isset($_SESSION['loi'])): ?>
                <div class="loi">
                    <?=$_SESSION['loi']?>
                </div>
            <?php endif; unset($_SESSION['loi']); ?>
            <div class="khung-nhap">
                <div class="khung-nhap-chung">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Nhập Email">
                    <?php if (isset($_SESSION['thieu-email'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-email']?></span>
                    <?php endif; unset($_SESSION['thieu-email']); ?>
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Số điện thoại</label>
                    <input type="number" name="sodienthoai" placeholder="Nhập số điện thoại">
                    <?php if (isset($_SESSION['thieu-sodienthoai'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-sodienthoai']?></span>
                    <?php endif; unset($_SESSION['thieu-sodienthoai']); ?>
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="diachi" placeholder="Nhập địa chỉ">
                    <?php if (isset($_SESSION['thieu-diachi'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-diachi']?></span>
                    <?php endif; unset($_SESSION['thieu-diachi']); ?>
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Giới tính</label>
                    <select name="gioitinh" id="">
                        <option value="" selected>Giới tính</option>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                    <?php if (isset($_SESSION['thieu-gioitinh'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-gioitinh']?></span>
                    <?php endif; unset($_SESSION['thieu-gioitinh']); ?>
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="pass1" placeholder="Nhập mật khẩu">
                    <?php if (isset($_SESSION['thieu-matkhau'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-matkhau']?></span>
                    <?php endif; unset($_SESSION['thieu-matkhau']); ?>
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" name="pass2" placeholder="Nhập mật khẩu">
                    <?php if (isset($_SESSION['thieu-xacnhan'])): ?>
                        <span style="color: red"><?=$_SESSION['thieu-xacnhan']?></span>
                    <?php endif; unset($_SESSION['thieu-xacnhan']); ?>
                </div>
            </div>
            <div class="ho_tro">
                <div class="khung-left">
                    <a href="#"></a>
                </div>
                <div class="khung-right">
                    Bạn đã có tài khoản? <a href="?mod=user&act=login">Đăng nhập</a>
                </div>
            </div>
            <button type="submit" name="submit-register">ĐĂNG KÝ</button>
        </form>
    </section>
</div>