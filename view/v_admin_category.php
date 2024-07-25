<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Danh Mục
        </h2>
        <div class="them-tai_khoan">
            <a href="<?=$base_url?>?mod=admin&act=category-add">Thêm danh mục</a>
        </div>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th class="text-left">Tên danh mục</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsDM as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td><img style="width: 50px" src="<?=$base_url?>upload/category/<?=$ds['HinhAnh']?>" alt=""></td>
                <td class="text-left"><?=$ds['TenDanhMuc']?></td>
                <td>
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=category-edit&id=<?=$ds['MaDanhMuc']?>">Sửa</a>
                        <button onclick="deleteCategory(<?=$ds['MaDanhMuc']?>)" class="xoa">Xóa</button>
                    </div>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</main>
<script>
    function deleteCategory(Madm) {
        var kq = confirm('Bạn có muốn xóa danh mục này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=category-delete&id='+Madm;
        }
    }
</script>