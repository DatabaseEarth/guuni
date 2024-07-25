<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Loại bài viết
        </h2>
        <div class="them-tai_khoan">
            <a href="<?=$base_url?>?mod=admin&act=post-add">Thêm Loại bài viết</a>
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
                <th>Tên Loại bài viết</th>
                <th class="text-left">Trạng thái loại bài</th>
                <th class="text-left">Thứ tự</th>
                <th class="text-left">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsLBV as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$ds['TenLoaiBai']?></td>
                <td>
                    <?php
                        switch ($ds['TrangThaiLoaiBai']) {
                            case '0':
                                echo 'Ẩn';
                                break;
                            case '1':
                                echo 'Hiện';
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                </td>
                <td><?=$ds['ThuTu']?></td>
                <td class="text-left">
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=post-edit&id=<?=$ds['MaLoaiBai']?>">Sửa</a>
                        <button onclick="deleteUser(<?=$ds['MaLoaiBai']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
            <section class="phan_trang container">
                    <div class="khung-phan_trang">
                        <a class="<?=($page<=1)?'none':''?>" href="?mod=admin&act=post&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                        <?php for($i=1; $i<=$sotrang;$i++): ?>
                            <a class="<?=($page==$i)?'chinh':''?>" href="?mod=admin&act=post&page=<?=$i?>"><?=$i?></a>
                        <?php endfor; ?>
                        <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=admin&act=post&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </section>
        </tfoot>
    </table>
</main>
<script>
    function deleteUser(MaLoaiBai) {
        var kq = confirm('Bạn có muốn xóa loại bài viết này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=post-delete&id='+MaLoaiBai;
        }
    }
</script>