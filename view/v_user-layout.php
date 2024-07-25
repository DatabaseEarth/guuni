<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUUNI</title>
    <link rel="icon" type="image/png" href="<?=$base_url?>assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="khung-layout-header">
                <div class="logo">
                    <a href="?mod=page&act=home">
                        <img src="<?=$base_url?>assets/images/logo.jpg" alt="">
                    </a>
                </div>
                <nav>
                    <ul>
                        <?php foreach($dsDanhMuc as $ds): ?>
                        <li>
                            <a href="<?=$base_url?>?mod=product&act=list&id=<?=$ds['MaDanhMuc']?>"><?=$ds['TenDanhMuc']?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <form action="<?=$base_url?>?mod=product&act=search" method="post">
                    <div class="khung-search">
                        <button type="submit-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input name="keyword" type="search" placeholder="Tìm kiếm">
                    </div>
                    
                    <div class="khung-bars">
                        <button>
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </form>
                <div class="khung-gio-dang">
                    <a href="">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    <a href="<?=$base_url?>?mod=product&act=cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <?php if(!isset($_SESSION['user'])): ?>
                        <a href="<?=$base_url?>?mod=user&act=login">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    <?php else: ?>
                        <div class="user">
                            <div class="anhTK">
                                <img src="<?=$base_url?>upload/avatar/<?=$_SESSION['user']['HinhAnhTK']?>" alt="">
                            </div>
                            <div class="khung-out-admin">
                                <ul>
                                    <?php if(($_SESSION['user']['Quyen'])>0): ?>
                                    <li>
                                        <a href="<?=$base_url?>?mod=admin&act=dashboard">Vào trang admin</a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?=$base_url?>?mod=user&act=edit&id=<?=$_SESSION['user']['MaTK']?>">Quản lý tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="<?=$base_url?>?mod=user&act=logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- ------------------------------------------------- -->
    <main>
        <?php include_once 'view/v_'.$view_name.'.php'; ?>
    </main>
    <!-- ------------------------------------------------- -->
    <section class="nhan-thong_tin container">
        <div class="tieu_de">
            <h3>
                Đăng ký nhận bản tin của chúng tôi
            </h3>
        </div>
        <div class="mo_ta">
            Nhận tin tức mới về các ưu đãi sắp tới từ nhiều nhà cung cấp dịch vụ thay thế trên toàn thế giới
        </div>
        <form action="" method="post">
            <input type="text" placeholder="Email">
            <button type="submit">Đăng ký</button>
        </form>
    </section>
    <section class="tien_ich">
        <div class="khung-layout-tien_ich container">
            <div class="khung-o-tien_ich">
                <div class="icon">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="thong_tin">
                    <div class="tieu_de">
                        Chính sách bảo hành
                    </div>
                    <div class="noi_dung">
                        Nhận hàng, thanh toán tại nhà
                    </div>
                </div>
            </div>
            <div class="khung-o-tien_ich">
                <div class="icon">
                    <i class="fa-solid fa-arrows-rotate"></i>
                </div>
                <div class="thong_tin">
                    <div class="tieu_de">
                        Đổi trả dễ dàng
                    </div>
                    <div class="noi_dung">
                        Đổi mới trong 7 ngày đầu
                    </div>
                </div>
            </div>
            <div class="khung-o-tien_ich">
                <div class="icon">
                    <i class="fa-brands fa-cc-visa"></i>
                </div>
                <div class="thong_tin">
                    <div class="tieu_de">
                        Thanh toán tiện lợi
                    </div>
                    <div class="noi_dung">
                        Trả tiền mặt, CK, trả góp 0%
                    </div>
                </div>
            </div>
            <div class="khung-o-tien_ich">
                <div class="icon">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div class="thong_tin">
                    <div class="tieu_de">
                        Hỗ trợ nhiệt tình
                    </div>
                    <div class="noi_dung">
                        Tư vấn, giải đáp mọi thắc mắc
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-web">
        <div class="container">
            <div class="khung-layout-footer-web">
                <div class="khung-o-footer">
                    <div class="logo-footer-web">
                        <a href="#">
                            <img src="assets/images/logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="thong_tin-footer">
                        <a href="<?=$base_url?>?mod=page&act=about">Thông tin về trang web</a>
                        <a href="<?=$base_url?>?mod=page&act=baiViet">Tin tức</a>
                    </div>
                    <div class="lien_he-footer">
                        <div class="tieu_de">
                            Liên hệ với chúng tôi
                        </div>
                        <div class="icon-footer">
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="khung-o-footer">
                    <div class="tieu_de">
                        Hỗ trợ khách hàng
                    </div>
                    <ul>
                        <li>
                            <a href="<?=$base_url?>?mod=page&act=huongDan-online">
                                Hướng dẫn mua hàng online
                            </a>
                        </li>
                        <li>
                            <a href="<?=$base_url?>?mod=page&act=cham-soc">
                                Chăm sóc khách hàng
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="khung-o-footer">
                    <div class="tieu_de">
                        Chính sách chung
                    </div>
                    <ul>
                        <li>
                            <a href="<?=$base_url?>?mod=page&act=van-chuyen">
                               Chính sách vận chuyển
                            </a>
                        </li>
                        <li>
                            <a href="<?=$base_url?>?mod=page&act=giao-hang">
                                Chính sách giao hàng
                            </a>
                        </li>
                        <li>
                            <a href="<?=$base_url?>?mod=page&act=bao-mat">
                                Bảo mật thông tin khách hàng
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="khung-o-footer">
                    <div class="tieu_de">
                        Địa điểm cửa hàng
                    </div>
                    <div class="anh-thanh_toan-footer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3969.070301926958!2d106.62898844244064!3d10.853436992286278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1700966418948!5m2!1svi!2s" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="footer-tac_gia">
        <div class="layout-tac_gia container">
            <div class="ban-quyen">
                &copy; 2023 GUUNI
            </div>
            <div class="truong">
                Cao đẳng FPT Polytechnic
            </div>
        </div>
    </section>

    <script src="assets/js/main.js"></script>
</body>
</html>