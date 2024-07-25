
<main class="admin_user_add">
    <h2 class="tieu_de">Sửa bài viết</h2>
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="khung-1-2">
            <div class="khung-1">
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Tiêu đề bài viết</label>
                    <input class="nhap-thong_tin" name="TieuDe" type="text" placeholder="Nhập tiêu đề bài viết" value="<?=$CTbv['TieuDe']?>">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Ngày đăng bài</label>
                    <input class="nhap-thong_tin" name="NgayDangBai" type="date" value="<?=$CTbv['NgayDangBai']?>">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Lượt xem</label>
                    <input class="nhap-thong_tin" name="LuotXem" type="number" value="<?=$CTbv['LuotXem']?>">
                </div>
            </div>
            <div class="khung-2">
                <div class="khung-chung">
                    <label for="" class="tieu_de-chung">Nổi bật</label>
                    <select name="NoiBat" id="" class="form-select">
                        <option value="0" <?= ($CTbv['NoiBat']==0)?'selected':''?>>không nổi bật</option>
                        <option value="1" <?= ($CTbv['NoiBat']==1)?'selected':''?>>Nổi bật</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label for="" class="tieu_de-chung">Trạng thái</label>
                    <select name="TrangThaiBai" id="" class="form-select">
                        <option value="0" <?= ($CTbv['TrangThaiBai']==0)?'selected':''?>>Ẩn</option>
                        <option value="1" <?= ($CTbv['TrangThaiBai']==1)?'selected':''?>>Hiện</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Loại bài viết</label>
                    <select class="form-select" name="MaLoaiBai" id="">
                        <?php foreach($dsLB as $ds): ?>
                            <option value="<?=$ds['MaLoaiBai']?>" <?= ($CTbv['MaLoaiBai']==$ds['MaLoaiBai'])?'selected':''?>><?=$ds['TenLoaiBai']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="xac_nhan-them">
                    <button type="submit" value="submit" name="submit">Xác nhận thêm</button>
                </div>
            </div>
        </div>
        <div class="khung-3">
            <div class="khung-chung">
                <label class="tieu_de-chung" for="">Nội dung bài viết</label>
                <textarea id="mota" type="text" name="NoiDung" class="" placeholder="" style="padding: 20px; border: 1px solid #d5d5d5"><?=$CTbv['NoiDung']?></textarea>
            </div>
        </div>
    </form>
</main>
<script src="<?=$base_url?>assets/ckeditor5/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#mota' ), {language: 'vi'} )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );    
</script>