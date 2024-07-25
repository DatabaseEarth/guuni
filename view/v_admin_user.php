<main class="admin_user">
    <div class="tieu_de-them">
        <h2 class="tieu_de">
            Tài khoản
        </h2>
        <div class="them-tai_khoan">
            <a href="<?=$base_url?>?mod=admin&act=user-add">Thêm tài khoản</a>
        </div>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th class="text-left">Email</th>
                <th class="text-left">Mật khẩu</th>
                <th>Giới tính</th>
                <th>Quyền</th>
                <th class="text-left">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($dsTK as $ds): ?>
            <tr>
                <td><?=$i?></td>
                <td><img src="<?=$base_url?>upload/avatar/<?=$ds['HinhAnhTK']?>" alt="" style="width: 30px"></td>
                <td class="text-left"><?=$ds['Email']?></td>
                <td class="text-left"><?=$ds['MatKhau']?></td>
                <td>
                    <?php
                        switch ($ds['GioiTinh']) {
                            case '2':
                                echo 'khác';
                                break;
                            case '1':
                                echo 'Nam';
                                break;
                            case '0':
                                echo 'Nữ';
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        switch ($ds['Quyen']) {
                            case '2':
                                echo 'Quản lý cấp cao';
                                break;
                            case '1':
                                echo 'Quản lý';
                                break;
                            case '0':
                                echo 'Khách hàng';
                                break;
                            default:
                                # code...
                                break;
                        }
                    ?>
                </td>
                <td class="text-left">
                    <div class="hanh_dong">
                        <a class="sua" href="<?=$base_url?>?mod=admin&act=user-edit&id=<?=$ds['MaTK']?>">Sửa</a>
                        <button onclick="deleteUser(<?=$ds['MaTK']?>)" class="xoa">Xóa</button>
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
    function deleteUser(MaTK) {
        var kq = confirm('Bạn có muốn xóa tài khoản này không?');
        if (kq) {
            window.location = '<?=$base_url?>?mod=admin&act=user-delete&id='+MaTK;
        }
    }
</script>