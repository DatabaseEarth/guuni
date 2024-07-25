<div class="product_pay">
    <div class="container">
        <form action="" method="post">
            <h3>Xác nhận đơn hàng</h3>
            
            <div class="khung-layout-pay">
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
                <div class="khung-thong_tin-chung">
                    <label for="">Tên khách hàng:</label>
                    <input type="text" name="TenKH" placeholder="Mới nhập tên">
                </div>
                <div class="khung-thong_tin-chung">
                    <label for="">Địa chỉ nhận hàng:</label>
                    <input type="text" name="DiaDiem" placeholder="Mới nhập địa chỉ">
                </div>
                <div class="khung-thong_tin-chung">
                    <label for="">Ghi chú</label>
                    <textarea name="Ghichu" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="khung-tong_gia">
                    Tổng thiệt hại: <?=number_format($TongTien)?>đ
                </div>
                <div class="khung-chu_y">
                    Đơn hàng sẽ được giao ngay và thanh toán sau khi nhận được hàng
                </div>
                <button type="submit" class="xac-nhan" name="submit-thanh_toan">Xác nhận đơn hàng</button>
            </div>
        </form>
    </div>
</div>