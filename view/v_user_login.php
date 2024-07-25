<div class="user_login">
    <section class="login container">
        <form action="" method="post">
            <h3>ĐĂNG NHẬP</h3>
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
            <div class="khung-nhap">
                <div class="khung-nhap-chung">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Nhập Email">
                </div>
                <div class="khung-nhap-chung">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="pass" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="ho_tro">
                <div class="khung-left">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="khung-right">
                    Bạn chưa có tài khoản? <a href="?mod=user&act=register">Đăng ký</a>
                </div>
            </div>
            <button type="submit" name="submit-login">ĐĂNG NHẬP</button>
        </form>
    </section>
</div>