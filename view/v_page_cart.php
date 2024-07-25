<div class="page_cart">
    <section class="container">
        <form action="" method="post" class="khung-gio_hang">
            <?php if(isset($dsDonHang)): ?>
            <div class="khung-thong_tin">
                <h2 class="tieu_de">Giỏ hàng của tôi (<span><?php if(isset($countDonHang)): ?><?=$countDonHang?><?php else: ?>0<?php endif; ?></span>)</h2>
                <div class="khung-layout_don_hang">
                    <?php $tongGia = 0; foreach($dsDonHang as $ds): ?>
                    <div class="khung-o-don_hang">
                        <div class="khung-noi_dung-don_hang">
                            <div class="thong_tin">
                                <div class="anh">
                                    <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="ảnh tài khoản">
                                </div>
                                <div class="thong_tin-don_hang">
                                    <div class="ve-don_hang">
                                        <div class="ten-san_pham">
                                            <?=$ds['TenSP']?>
                                        </div>
                                        <div class="mo_ta-ngan">
                                            <?=$ds['MoTa']?>
                                        </div>
                                    </div>
                                    <div class="khung-xoa-xem">
                                        <a href="<?=$base_url?>?mod=product&act=deleteCart&id=<?=$ds['MaSP']?>" class="xoa">Xóa</a>
                                        <a class="xem" href="<?=$base_url?>?mod=product&act=detail&id=<?=$ds['MaSP']?>">Xem sản phẩm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="khung-so_luong-gia">
                            <div class="gia"><?=number_format($ds['GiaGoc'])?>đ</div>
                        </div>
                    </div>
                    <?php $tongGia+=$ds['GiaGoc']; endforeach; ?>
                    
                </div>
                <div class="cach_ngang"></div>
                <div class="khung-chon_chung">
                    <div class="khung-xoa_tat">
                        <a href="">Xóa tất cả</a>
                    </div>
                </div>
            </div>

            <div class="khung-thanh_toan">
                <h2 class="tieu_de">Thông tin đơn hàng</h2>
                <div class="khung-layout-thanh_toan">
                    <div class="khung-tam_tinh">
                        <div class="tieu_de-tam_tinh">
                            Tạm tính (<span><?php if(isset($countDonHang)): ?><?=$countDonHang?><?php endif; ?></span>) Đơn hàng
                        </div>
                        <div class="noi_dung-tam_tinh">
                            <?=number_format($tongGia)?>đ
                        </div>
                    </div>
                    <div class="khung-tam_tinh">
                        <div class="tieu_de-tam_tinh">
                            Phí vận chuyển
                        </div>
                        <div class="noi_dung-tam_tinh">
                            0đ
                        </div>
                    </div>
                </div>
                <div class="tong_cong">
                    <div class="tieu_de-tong_cong">
                        Tổng cộng: 
                    </div>
                    <div class="noi_dung-tong_cong">
                        <?=number_format($tongGia)?>đ
                    </div>
                </div>
                <div class="submit-thanh_toan">
                    <a href="<?=$base_url?>?mod=product&act=pay&id=<?=$checkIsset['MaDH']?>&gia=<?=$tongGia?>">Xác nhận thanh toán</a>
                </div>
            </div>
            <?php else: ?>
                Bạn chưa có giỏ hàng nào!
            <?php endif; ?>
        </form>
    </section>
    
    <section class="san_pham-loai">
        <div class="container">
            <div class="tieu_de-loai">
                <h3>Có thể bạn quan tâm <i class="fa-brands fa-gripfire"></i></h3>
            </div>
            <div class="khung-layout-loai">
                <?php foreach($dsRanDomsp as $ds): ?>
                <a href="<?=$base_url?>?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
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
</div>
