<main class="admin_comment">
    <div class="tieu_de">
        <h3>Các sản phẩm được comment</h3>
    </div>
    <div class="khung-layout-san_pham">
        <?php foreach($dsSpBl as $ds): ?>
        <a href="<?=$base_url?>?mod=admin&act=comment-feedback&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
            <div class="anh-san_pham">
                <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="ảnh sản phẩm">
            </div>
            <div class="thong-tin">
                <div class="ten-san_pham">
                <?=$ds['TenSP']?>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</main>