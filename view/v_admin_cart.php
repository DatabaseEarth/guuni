<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Đơn hàng
        </h2>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Tên khách hàng</th>
                <th class="text-left">Tổng tiền</th>
                <th class="text-left">Ghi chú</th>
                <th>Trạng thái</th>
                <th class="text-left">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsDH as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$ds['Email']?></td>
                <td><?=$ds['TenKH']?></td>
                <td class="text-left"><?=$ds['TongTien']?></td>
                <td class="text-left"><?=$ds['Ghichu']?></td>
                <td>
                    <?php
                        switch ($ds['TrangThai']) {
                            case 'gio-hang':
                                echo 'Giỏ hàng';
                                break;
                            case 'thanh-toan':
                                echo 'Thanh toán';
                                break;
                            case 'thanh-cong':
                                echo 'Thành Công';
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                </td>
                <td class="text-left">
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=cart-detail&id=<?=$ds['MaDH']?>">Xem chi tiết</a>
                        <button onclick="deleteUser(<?=$ds['MaDH']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
            <section class="phan_trang container">
                    <div class="khung-phan_trang">
                        <a class="<?=($page<=1)?'none':''?>" href="?mod=admin&act=user&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                        <?php for($i=1; $i<=$sotrang;$i++): ?>
                            <a class="<?=($page==$i)?'chinh':''?>" href="?mod=admin&act=user&page=<?=$i?>"><?=$i?></a>
                        <?php endfor; ?>
                        <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=admin&act=user&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </section>
        </tfoot>
    </table>
</main>
<script>
    function deleteUser(MaDH) {
        var kq = confirm('Bạn có muốn xóa đơn hàng này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=cart-delete&id='+MaDH;
        }
    }
</script>