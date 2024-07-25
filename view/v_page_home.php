<div class="page_home">
    <section class="banner">
        <ul>
            <?php foreach($dsSlider as $sl): ?>
            <li>
                <img src="<?=$base_url?>upload/slider/<?=$sl['anhSlider']?>" alt="">
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="btn-prev" onclick="prev()">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="btn-next" onclick="next()">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </section>

    <section class="container">
        <div class="layout-deal">
            <a href="<?=$base_url?>?mod=page&act=baiViet" class="khung-o-deal khung-1">
                <div class="thong-tin">
                    <div class="tieu_de">
                        Bài viết mới nhất
                    </div>
                    <div class="upto">
                        Cập nhật thông tin hằng ngày
                    </div>
                </div>
                <div class="anh">
                    <img src="<?=$base_url?>assets/images/anh-bai_viet.png" alt="">
                </div>
            </a>
            <a href="<?=$base_url?>?mod=page&act=baiViet-NB" class="khung-o-deal khung-2">
                <div class="thong-tin">
                    <div class="tieu_de">
                        Bài viết nổi bật
                    </div>
                    <div class="upto">
                        Nhiều thông tin được quan tâm nhất
                    </div>
                </div>
                <div class="anh">
                    <img src="<?=$base_url?>assets/images/anh-bai_viet-noi_bat.png" alt="">
                </div>
            </a>
        </div>
    </section>
    <section class="danh_muc container">
        <div class="tieu_de">
            <h3>Danh mục thời trang Nam</h3>
        </div>
        <div class="khung-layout-danh_muc">
            <?php foreach($danh_muc as $ds): ?>
            <a href="?mod=product&act=list&id=<?=$ds['MaDanhMuc']?>" class="khung-o-danh_muc">
                <div class="anh-danh_muc">
                    <img src="<?=$base_url?>upload/category/<?=$ds['HinhAnh']?>" alt="ảnh danh mục">
                    <div class="mo_ta">
                        <?=$ds['MoTaNgan']?>
                    </div>
                </div>
                <div class="ten-danh_muc">
                    <?=$ds['TenDanhMuc']?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="container">
        <div class="tot_hon">
            <div class="thong_tin" style="background-image: url(<?=$base_url?>assets/images/anh-tot_hon.png);">
                <div class="noi_dung">
                    <div class="tieu_de">
                        Chúng tôi sẽ cải thiện thời trang của bạn tốt hơn!
                    </div>
                    <div class="mo_ta">
                        trong hành trình cải thiện thời trang hàng ngày của chúng tôi, <strong style="color: yellow">GUUNI</strong> giới thiệu dòng trang phục <strong>MỖI NGÀY</strong> - Thời trang thoải mái & giá cả phải chăng 24/7
                    </div>
                    <div class="nut">
                        <button>Mua ngay</button>
                    </div>
                </div>
            </div>
            <div class="anh-tot_hon">
                <img src="<?=$base_url?>assets/images/tot_hon.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="san_pham-hot">
        <div class="container">
            <div class="tieu_de-hot">
                <h3>Sản phẩm HOT <i class="fa-brands fa-gripfire"></i></h3>
            </div>
            <div class="khung-layout-hot">
                <?php foreach($dsHot as $ds): ?>
                <a href="?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
                    <div class="anh-san_pham">
                        <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="">
                    </div>
                    <div class="thong_tin">
                        <div class="ten-san_pham">
                        <?=$ds['TenSP']?>
                        </div>
                        <div class="gia-san_pham">
                        <?=number_format($ds['GiaGoc'])?>đ
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 10px; margin-bottom: 30px">
        <hr>
    </div>

    <section class="san_pham-hot">
        <div class="container">
            <div class="tieu_de-hot">
                <h3>Sản phẩm Mới <i class="fa-solid fa-ticket"></i></h3>
            </div>
            <div class="khung-layout-hot">
                <?php foreach($dsNew as $ds): ?>
                <a href="?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
                    <div class="anh-san_pham">
                        <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="">
                    </div>
                    <div class="thong_tin">
                        <div class="ten-san_pham">
                        <?=$ds['TenSP']?>
                        </div>
                        <div class="gia-san_pham">
                        <?=number_format($ds['GiaGoc'])?>đ
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="container">
        <div class="hang">
            <h3>Nhãn hiệu hàng đầu</h3>
            <div class="mo_ta">
                Thương hiệu hàng đầu giảm giá tới <span>60%</span> cho các thương hiệu
            </div>
            <div class="khung-layout-hang">
                <?php foreach($dsDT as $dt): ?>
                <div class="khung-o-hang">
                    <img src="<?=$base_url?>upload/partner/<?=$dt['HinhAnhDT']?>" alt="">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>