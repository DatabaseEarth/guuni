<div class="page_bai_viet">
    <div class="khung-bai_viet container">
        <h1>Bài viết nổi bật</h1>
        <?php foreach($dsBV as $ds): ?>
        <div class="khung-o-bai_viet">
            <div class="khung-tieu_de">
                <h3><?=$ds['TieuDe']?></h3>
                <div class="tac_gia">
                    Tác giả: <?=$ds['Email']?>
                </div>
            </div>
            <div class="khung-ngay-xem">
                <div class="ngay">Ngày đăng bài: <?=date('d/m/Y - H:i:s', strtotime($ds['NgayDangBai']))?></div>
                <div class="xem"><i class="fa-solid fa-eye"></i> <?=$ds['LuotXem']?></div>
            </div>
            <div class="cach_ngang"></div>
            <div class="khung-noi_dung">
                <?=$ds['NoiDung']?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <section class="phan_trang container">
        <div class="khung-phan_trang">
            <a class="<?=($page<=1)?'none':''?>" href="?mod=page&act=baiViet-NB&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
            <?php for($i=1; $i<=$sotrang;$i++): ?>
                <a class="<?=($page==$i)?'chinh':''?>" href="?mod=page&act=baiViet-NB&page=<?=$i?>"><?=$i?></a>
            <?php endfor; ?>
            <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=page&act=baiViet-NB&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
        </div>
    </section>
</div>