<div class="product_list">
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
    <?php if(isset($kt) && $kt==true): ?>
        <section class="container">
            <div class="khung-layout-product_list">
                <div class="khung-filter">
                <div class="khung-noi_dung">
                    <div class="khung-layout-san_pham">
                        <?php foreach($dsSPDM as $ds): ?>
                        <a href="?mod=product&act=detail&id=<?=$ds['MaSP']?>" class="khung-o-san_pham">
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
                            <a class="<?=($page<=1)?'none':''?>" href="?mod=product&act=list&id=<?=$_GET['id']?>&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                            <?php for($i=1; $i<=$sotrang;$i++): ?>
                                <a class="<?=($page==$i)?'chinh':''?>" href="?mod=product&act=list&id=<?=$_GET['id']?>&page=<?=$i?>"><?=$i?></a>
                            <?php endfor; ?>
                            <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=product&act=list&id=<?=$_GET['id']?>&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    <?php endif; ?>   
</div>