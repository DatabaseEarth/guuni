<div class="product_detail">
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

    <?php if(isset($dsSanPham) && $dsSanPham==true): ?>
        <section class="thong_tin-san_pham container">
            <div class="anh-san_pham">
                <div class="anh-phu">
                    <img src="<?=$base_url?>upload/product/<?=$dsSanPham['HinhAnh']?>" alt="">
                    <img src="<?=$base_url?>upload/product/<?=$dsSanPham['HinhAnh']?>" alt="">
                    <img src="<?=$base_url?>upload/product/<?=$dsSanPham['HinhAnh']?>" alt="">
                    <img src="<?=$base_url?>upload/product/<?=$dsSanPham['HinhAnh']?>" alt="">
                </div>
                <div class="anh-chinh">
                    <img src="<?=$base_url?>upload/product/<?=$dsSanPham['HinhAnh']?>" alt="">
                </div>
            </div>
            <div class="chi_tiet-san_pham">
                <div class="nav-detail">
                    <a href="#">Trang chủ</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="#">Sản phẩm</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="#">Chi tiết</a>
                </div>
                <div class="ten-san_pham">
                    <?=$dsSanPham['TenSP']?>
                </div>
                <div class="danh_gia-comment">
                    <div class="danh_gia">
                        Đánh giá: 
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="comment">
                        <i class="fa-regular fa-eye"></i> <span><?=$dsSanPham['Xem']?></span> lượt xem
                    </div>
                </div>
                <div class="khung-gia">
                    <div class="gia_goc">
                        Giá gốc chính hãng: <?=number_format($dsSanPham['GiaGoc'])?> đ
                    </div>
                </div>
                <div class="khung-kich_thuoc">
                    <div class="tieu_de-kich_thuoc">
                        Kích thước
                    </div>
                    <div class="khung-size">
                        <div class="o-size">XS</div>
                        <div class="o-size">S</div>
                        <div class="o-size">M</div>
                        <div class="o-size">L</div>
                        <div class="o-size">XL</div>
                    </div>
                </div>
                <div class="khung-mau">
                    <div class="tieu_de-mau">
                        Màu
                    </div>
                    <div class="khung-chon">
                        <div class="o-mau" style="background-color: red"></div>
                        <div class="o-mau" style="background-color: yellow"></div>
                        <div class="o-mau" style="background-color: green"></div>
                        <div class="o-mau" style="background-color: orange"></div>
                    </div>
                </div>
                <div class="khung-them-mua">
                    <a href="<?=$base_url?>?mod=product&act=addToCart&id=<?=$dsSanPham['MaSP']?>" class="add">Thêm vào giỏ</a>
                    <a href="#">Mua ngay</a>
                </div>
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
        </section>
        <section class="mo_ta container">
            <div class="tieu_de-mo_ta">
                <h3><i class="fa-solid fa-pen-to-square"></i>Thông tin sản phẩm</h3>
            </div>
            <div class="cach_ngang"></div>
            <div class="noi_dung">
                <?=$dsSanPham['MoTa']?>
            </div>
        </section>

        <section class="san_pham-loai">
            <div class="container">
                <div class="tieu_de-loai">
                    <h3>Sản phẩm cùng loại <i class="fa-brands fa-gripfire"></i></h3>
                </div>
                <div class="khung-layout-loai">
                    <?php foreach($dsRandomDanhMuc as $ds): ?>
                    <a href="?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
                        <div class="anh-san_pham">
                            <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="">
                        </div>
                        <div class="thong_tin">
                            <div class="ten-san_pham">
                            <?=$ds['TenSP']?>
                            </div>
                            <div class="gia-san_pham">
                            <?=$ds['GiaGoc']?>đ
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <section class="container">
            <div class="khung-layout-danh_gia">
                <div class="khung-danh_gia">
                    <h2 class="tieu_de">Bình luận</h2>
                    <?php if(isset($_SESSION['user'])): ?>
                    <form action="?mod=user&act=comment" method="post">
                        <input type="hidden" name="MaSanPham" value="<?=$dsSanPham['MaSP']?>">
                        <input type="text" name="NoiDung" placeholder="Bạn suy nghĩ gì về sản phẩm này">
                        <button class="btn-comment" type="submit">Gửi</button>
                    </form>
                    <?php endif; ?>
                    <div class="cach_ngang"></div>
                    <div class="khung-binh_luan">
                        <?php if($dsBL==false): ?>
                            <div class="khung-o-binh_luan">
                                Chưa có bình luận nào về sản phẩm này
                            </div>
                        <?php endif; ?>
                        <?php foreach($dsBL as $bl): ?>
                        <div class="khung-o-binh_luan">
                            <div class="thong_tin">
                                <div class="khung-user">
                                    <div class="anh-user">
                                        <img src="<?=$base_url?>upload/avatar/<?=$bl['HinhAnhTK']?>" alt="">
                                    </div>
                                    <div class="thong_tin-user">
                                        <div class="ten-user">
                                            <?=$bl['Email']?>
                                        </div>
                                        <div class="trang-thai">
                                            Đã mua hàng
                                        </div>
                                    </div>
                                </div>
                                <div class="khung-tinh_trang">
                                    <div class="ngay-binh_luan">
                                        Ngày bình luận: <span><?=date('d/m/y H:i:s',strtotime($bl['NgayDang']))?></span>
                                    </div>
                                    <div class="danh_gia">
                                        Đánh giá: 
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="noi_dung">
                                <?=$bl['NoiDung']?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="khung-anh-quang_cao">
                    ẢNH QUẢNG CÁO
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>