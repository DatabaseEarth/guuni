<div class="product_list">
    <section class="container">
        <div class="khung-layout-product_list">
            <div class="khung-noi_dung">
                <div class="khung-layout-san_pham">
                    <?php foreach($dsSearch as $ds): ?>
                    <a href="<?=$base_url?>?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
                        <div class="anh">
                            <img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="">
                        </div>
                        <div class="thong_tin">
                            <div class="ten">
                            <?=$ds['TenSP']?>
                            </div>
                            <div class="gia">
                            <?=number_format($ds['GiaGoc'])?>đ
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>

                <section class="phan_trang container">
                    <div class="khung-phan_trang">
                        <a class="<?=($page<=1)?'none':''?>" href="?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                        <?php for($i=1; $i<=$sotrang;$i++): ?>
                            <a class="<?=($page==$i)?'chinh':''?>" href="?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$i?>"><?=$i?></a>
                        <?php endfor; ?>
                        <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=product&act=search&keyword=<?=$_GET['keyword']?>&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>