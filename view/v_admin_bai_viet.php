<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Bài viết
        </h2>
        <div class="them-tai_khoan">
            <a href="<?=$base_url?>?mod=admin&act=baiViet-add">Thêm bài viết</a>
        </div>
    </div>
    <?php if(isset($_SESSION['loi'])): ?>
        <div class="loi-chung">
            <?=$_SESSION['loi']?>
        </div>
    <?php endif; unset($_SESSION['loi']) ?>
    <?php if(isset($_SESSION['thongbao'])): ?>
        <div class="thongbao-chung">
            <?=$_SESSION['thongbao']?>
        </div>
    <?php endif; unset($_SESSION['thongbao']) ?>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th class="text-left">Tiêu đề bài viết</th>
                <th class="text-left">Ngày đăng bài</th>
                <th>Nổi bật</th>
                <th>Lượt xem</th>
                <th>Loại bài viết</th>
                <th class="text-left">Tác giả</th>
                <th class="text-left">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsBV as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td class="text-left"><?=$ds['TieuDe']?></td>
                <td class="text-left"><?=date('d/m/Y - H:i:s', strtotime($ds['NgayDangBai']))?></td>
                <td>
                    <?php
                        switch ($ds['NoiBat']) {
                            case '0':
                                echo 'không nổi bật';
                                break;
                            case '1':
                                echo 'Nổi bật';
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                </td>
                <td><?=$ds['LuotXem']?></td>
                <td><?=$ds['TenLoaiBai']?></td>
                <td class="text-left"><?=$ds['Email']?></td>
                <td class="text-left">
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=baiViet-edit&id=<?=$ds['MaBaiViet']?>">Sửa</a>
                        <button onclick="deleteUser(<?=$ds['MaBaiViet']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
            <section class="phan_trang container">
                <div class="khung-phan_trang">
                    <a class="<?=($page<=1)?'none':''?>" href="?mod=admin&act=baiViet&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                    <?php for($i=1; $i<=$sotrang;$i++): ?>
                        <a class="<?=($page==$i)?'chinh':''?>" href="?mod=admin&act=baiViet&page=<?=$i?>"><?=$i?></a>
                    <?php endfor; ?>
                    <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=admin&act=baiViet&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                </div>
            </section>
        </tfoot>
    </table>
</main>
<script>
    function deleteUser(MaLoaiBai) {
        var kq = confirm('Bạn có muốn xóa bài viết này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=baiViet-delete&id='+MaLoaiBai;
        }
    }
</script>