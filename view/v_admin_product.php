<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Sản phẩm
        </h2>
        <div class="them-tai_khoan">
            <a href="<?=$base_url?>?mod=admin&act=product-add">Thêm sản phẩm</a>
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
                <th>Hình ảnh</th>
                <th class="text-left">Tên sản phẩm</th>
                <th class="text-left">Danh mục</th>
                <th class="text-right">Giá trị</th>
                <th>Số lượng</th>
                <th>Lượt Xem</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsSP as $sp): ?>
            <tr>
                <td><?=$i?></td>
                <td><img style="width: 50px" src="<?=$base_url?>upload/product/<?=$sp['HinhAnh']?>" alt=""></td>
                <td class="text-left"><?=$sp['TenSP']?></td>
                <td class="text-left"><?=$sp['TenDanhMuc']?></td>
                <td class="text-right"><?=number_format($sp['GiaGoc'])?>đ</td>
                <td><?=$sp['Soluong']?></td>
                <td><?=$sp['Xem']?></td>
                <td>
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=product-edit&id=<?=$sp['MaSP']?>">Sửa</a>
                        <button onclick="deleteProduct(<?=$sp['MaSP']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
            <section class="phan_trang container">
                <div class="khung-phan_trang">
                    <a class="<?=($page<=1)?'none':''?>" href="?mod=admin&act=product&page=<?=$page-1?>"><i class="fa-solid fa-angles-left"></i></a>
                    <?php for($i=1; $i<=$sotrang;$i++): ?>
                        <a class="<?=($page==$i)?'chinh':''?>" href="?mod=admin&act=product&page=<?=$i?>"><?=$i?></a>
                    <?php endfor; ?>
                    <a class="<?=($page>=$sotrang)?'none':''?>" href="?mod=admin&act=product&page=<?=$page+1?>"><i class="fa-solid fa-angles-right"></i></a>
                </div>
            </section>
        </tfoot>
    </table>
</main>
<script>
    function deleteProduct(MaSP) {
        var kq = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=product-delete&id='+MaSP;
        }
    }
</script>