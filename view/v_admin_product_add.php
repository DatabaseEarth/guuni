
<main class="admin_user_add">
    <h2 class="tieu_de">Thêm sản phẩm</h2>
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
                    <label class="tieu_de-chung" for="">Tên sản phẩm</label>
                    <input class="nhap-thong_tin" name="TenSP" type="text" placeholder="Nhập Tên sản phẩm">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Giá gốc</label>
                    <input class="nhap-thong_tin" name="GiaGoc" type="number">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Giá khuyến mãi</label>
                    <input class="nhap-thong_tin" name="GiaKM" type="number">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Số lượng</label>
                    <input class="nhap-thong_tin" name="Soluong" type="number">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Xem</label>
                    <input class="nhap-thong_tin" name="Xem" type="number">
                </div>
            </div>
            <div class="khung-2">
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Hình ảnh</label>
                    <input class="nhap-thong_tin" name="HinhAnh" type="file">
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Mã thân thiện (SKU)</label>
                    <input class="nhap-thong_tin" name="SKU" type="text" placeholder="Nhập Mã SKU">
                </div>
                <div class="khung-chung">
                    <label for="" class="tieu_de-chung">Trạng thái</label>
                    <select name="TrangThai" id="" class="form-select">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label for="" class="tieu_de-chung">Hot</label>
                    <select name="Hot" id="" class="form-select">
                        <option value="0">Không hot</option>
                        <option value="1">HOT</option>
                    </select>
                </div>
                <div class="khung-chung">
                    <label class="tieu_de-chung" for="">Danh mục</label>
                    <select class="form-select" name="MaDanhMuc" id="">
                        <?php foreach($dsDm as $ds): ?>
                            <option value="<?=$ds['MaDanhMuc']?>"><?=$ds['TenDanhMuc']?></option>
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
                <label class="tieu_de-chung" for="">Mô tả</label>
                <textarea id="mota" type="text" name="MoTa" class="" placeholder="Nhập mô tả sản phẩm" style="padding: 20px; border: 1px solid #d5d5d5"></textarea>
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