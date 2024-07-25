<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Chi tiết đơn hàng của <?=$TenKH['Email']?>
        </h2>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh sản phẩm</th>
                <th class="text-left">Tên sản phẩm</th>
                <th class="text-left">Danh mục</th>
                <th>Giá trị</th>
                <th>Số lượng</th>
                <th>Lượt xem</th>
                <th class="text-left">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsCTDH as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td><img src="<?=$base_url?>upload/product/<?=$ds['HinhAnh']?>" alt="" style="width: 50px"></td>
                <td class="text-left"><?=$ds['TenSP']?></td>
                <td class="text-left"><?=$ds['TenDanhMuc']?></td>
                <td><?=$ds['GiaGoc']?></td>
                <td>1</td>
                <td><?=$ds['Xem']?></td>
                <td class="text-left">
                    <div class="hanh_dong">
                        <button onclick="deleteUser(<?=$_GET['id']?>,<?=$ds['MaCT']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
            <section class="phan_trang container">
                    <div class="khung-phan_trang">
                        <a class="<?=($page<=1)?'none':''?>" href="?mod=admin&act=cart-detail&id=<?=$_GET['id']?>&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                        <?php for($i=1; $i<=$sotrang;$i++): ?>
                            <a class="<?=($page==$i)?'chinh':''?>" href="?mod=admin&act=cart-detail&id=<?=$_GET['id']?>&page=<?=$i?>"><?=$i?></a>
                        <?php endfor; ?>
                        <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=admin&act=cart-detail&id=<?=$_GET['id']?>&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </section>
        </tfoot>
    </table>
</main>
<script>
    function deleteUser(MaDH,MaCTDH) {
        var kq = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=cartDetail-delete&MaDH='+MaDH+'&MaCTDH='+MaCTDH;
        }
    }
</script>