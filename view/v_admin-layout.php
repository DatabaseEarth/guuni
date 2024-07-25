<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUUNI</title>
    <link rel="icon" type="image/png" href="<?=$base_url?>assets/images/favicon.png">
    <!-- link css -->
    <link rel="stylesheet" href="<?=$base_url?>assets/css/admin.css">
    <!-- link font gg -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
    <!-- link font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- link reponsive -->
    <link rel="stylesheet" href="<?=$base_url?>assets/css/reponsive.css">
</head>
<body>
    <div class="khung-layout-admin">
        <nav class="khung-nav-admin">
            <div class="logo-an">
                <div class="an-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <a href="<?=$base_url?>?mod=page&act=home" class="logo">
                    <img src="<?=$base_url?>assets/images/logo.jpg" alt="">
                </a>
            </div>
            <div class="cach_ngang"></div>
            <div class="khung-nav">
                <ul>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=dashboard" class="<?=(strpos($view_name,'dashboard'))?'active':''?>">
                            <div class="icon-nav">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="tieu_de">
                                Thống kê
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=category" class="<?=(strpos($view_name,'category'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-regular fa-clipboard"></i>
                            </div>
                            <div class="tieu_de">
                                Danh mục
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=product" class="<?=(strpos($view_name,'product'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-solid fa-gift"></i>
                            </div>
                            <div class="tieu_de">
                                Sản phẩm
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=user" class="<?=(strpos($view_name,'user'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-regular fa-circle-user"></i>
                            </div>
                            <div class="tieu_de">
                                Tài khoản
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=cart" class="<?=(strpos($view_name,'cart'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div class="tieu_de">
                                Đơn hàng
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=comment" class="<?=(strpos($view_name,'comment'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-regular fa-comments"></i>
                            </div>
                            <div class="tieu_de">
                                Bình luận
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=post" class="<?=(strpos($view_name,'post'))?'active':''?>">
                            <div class="icon-nav">
                                <i class="fa-regular fa-address-card"></i>
                            </div>
                            <div class="tieu_de">
                                Loại bài viết
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$base_url?>?mod=admin&act=baiViet" class="<?=(strpos($view_name,'baiViet'))?'active':''?>">
                            <div class="icon-nav">
                            <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div class="tieu_de">
                                Bài viết
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="khung-height-bottom"></div>
            </div>
        </nav>
        <section class="khung-noi_dung-admin">
            <section class="khung-header-admin">
                <div class="khung-user">
                    <div class="anh-user">
                        <img src="<?=$base_url?>upload/avatar/<?=$_SESSION['user']['HinhAnhTK']?>" alt="">
                    </div>
                    <div class="thong_tin">
                        <div class="ten_user">
                            <?=$_SESSION['user']['Email']?>
                        </div>
                        <div class="quyen">
                            Xin chào Quản lý
                        </div>
                    </div>
                </div>
                <div class="tien_ich">
                    <ul>
                        <li>
                            <a href="#">
                            <i class="fa-solid fa-gear"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fa-solid fa-envelope"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fa-solid fa-bell"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fa-solid fa-comments"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="ruot">
                <!-- ruột của trang admin -->
                <?php include_once 'view/v_'.$view_name.'.php'?>
            </section>
        </section>
        
    </div>
    


    <script src="<?=$base_url?>assets/js/admin.js"></script>
</body>
</html>