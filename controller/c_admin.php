<?php
    if ($_SESSION['user']['Quyen']==0) {
        header('location: '.$base_url.'?mod=page&act=home');
    }
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'dashboard':
                include_once 'model/m_san_pham.php';
                include_once 'model/m_user.php';
                include_once 'model/m_binh_luan.php';
                include_once 'model/m_don_hang.php';
                $tkSP = sanPham_countAll();
                $tkTK = user_getAllUser();
                $tkBL = comment_countAlluser();
                $tkDH = donHang_countAll();
                $tkSPTheoDM = danhMuc_statBySP();
                $tkSPQuanTam = sanPham_stat();
                $view_name = 'admin_dashboard';
                break;
            case 'category':
                include_once 'model/m_danh-muc.php';
                $dsDM = danhMuc_getAllAdmin();

                $view_name = 'admin_category';
                break;
            case 'category-add':
                include_once 'model/m_danh-muc.php';
                if (isset($_POST['submit'])) {
                    $TenDanhMuc = $_POST['TenDanhMuc'];
                    $AnhDanhMuc = $_FILES['AnhDanhMuc']['name'];
                    $MoTaNgan = $_POST['MoTaNgan'];
                    $kq = danhMuc_add($TenDanhMuc,$AnhDanhMuc,$MoTaNgan);
                    if($kq){
                        // kiểm tra ảnh có bị lỗi không nếu như không lỗi thì lưu vào
                        if ($_FILES['AnhDanhMuc']['error']==0) {
                            # code...
                            $kq = move_uploaded_file(
                                $_FILES['AnhDanhMuc']['tmp_name'],
                                "upload/category/".$_FILES['AnhDanhMuc']['name']
                            );
                        }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã thêm danh mục thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=category');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                $view_name = 'admin_category_add';
                break;
            case 'category-edit':
                // lấy - xử lý dữ liệu
                include_once 'model/m_danh-muc.php';

                $MaDM = $_GET['id'];
                $CTdm = danhMuc_getById($MaDM);
                // bắt lỗi ảnh trùng hoặc ko lấy
                if (isset($_GET['id'])) {
                    // Tạo biến để lưu thông tin sản phẩm cũ
                    $data['dm'] = danhMuc_getById($_GET['id']);
                }
                if (isset($_POST['submit'])) {
                    // gán $anh = ảnh mới
                    $AnhDanhMuc = $_FILES['AnhDanhMuc']['name'];
                    if ($_FILES['AnhDanhMuc']['error']!=0) {
                        // không có ảnh hoặc ảnh bị lỗi
                        // lấy lại ảnh củ
                        $AnhDanhMuc = $data['dm']['AnhDanhMuc'];
                    }
                    $TenDanhMuc = $_POST['TenDanhMuc'];
                    $AnhDanhMuc;
                    $MoTaNgan = $_POST['MoTaNgan'];
                    $TrangThai = $_POST['TrangThai'];
                    
                    $kq = danhMuc_edit($TenDanhMuc,$AnhDanhMuc,$MoTaNgan,$TrangThai,$MaDM);
                    if($kq==true){
                        // KQ đúng, đã thêm vào được sản phẩm vào csdl
                        if ($_FILES['AnhDanhMuc']['error']==0) {
                            # code...
                            $kq = move_uploaded_file(
                                $_FILES['AnhDanhMuc']['tmp_name'],
                                "upload/category/".$_FILES['AnhDanhMuc']['name']
                            );
                        }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã sửa danh mục thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=category');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                // hiển thị dữ liệu
                $view_name = 'admin_category_edit';
                break;
            case 'category-delete':
                include_once 'model/m_danh-muc.php';
                danhMuc_delete($_GET['id']);
                header('Location: '.$base_url.'?mod=admin&act=category');
                break;
            case 'product':
                include_once 'model/m_san_pham.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsSP = sanPham_getAll($page);
                $sotrang = ceil(sanPham_countAll()/8);
                $view_name = 'admin_product';
                break;
            case 'product-add':
                include_once 'model/m_danh-muc.php';
                $dsDm = danhMuc_getAllAdmin();
                include_once 'model/m_san_pham.php';
                if (isset($_POST['submit'])) {
                    $TenSP = $_POST['TenSP'];
                    $HinhAnh = $_FILES['HinhAnh']['name'];
                    $GiaGoc = $_POST['GiaGoc'];
                    $GiaKM = $_POST['GiaKM'];
                    $Soluong = $_POST['Soluong'];
                    $Xem = $_POST['Xem'];
                    $MoTa = $_POST['MoTa'];
                    $SKU = $_POST['SKU'];
                    $TrangThai = $_POST['TrangThai'];
                    $Hot = $_POST['Hot'];
                    $MaDanhMuc = $_POST['MaDanhMuc'];
                    $kq = sanPham_add($TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc);
                    if($kq){
                        // kiểm tra ảnh có bị lỗi không nếu như không lỗi thì lưu vào
                        if ($_FILES['HinhAnh']['error']==0) {
                            # code...
                            $kq = move_uploaded_file(
                                $_FILES['HinhAnh']['tmp_name'],
                                "upload/product/".$_FILES['HinhAnh']['name']
                            );
                        }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã thêm sản phẩm thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=product');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                $view_name = 'admin_product_add';
                break;
            case 'product-edit':
                include_once 'model/m_danh-muc.php';
                $dsDm = danhMuc_getAllAdmin();
                include_once 'model/m_san_pham.php';
                $MaSP = $_GET['id'];
                $CTsp = sanPham_getById($MaSP);
                // bắt lỗi ảnh trùng hoặc ko lấy
                if (isset($_GET['id'])) {
                    // Tạo biến để lưu thông tin sản phẩm cũ
                    $data['sp'] = sanPham_getById($_GET['id']);
                }
                if (isset($_POST['submit'])) {
                    // gán $anh = ảnh mới
                    $HinhAnh = $_FILES['HinhAnh']['name'];
                    if ($_FILES['HinhAnh']['error']!=0) {
                        // không có ảnh hoặc ảnh bị lỗi
                        // lấy lại ảnh củ
                        $HinhAnh = $data['sp']['HinhAnh'];
                    }
                    $TenSP = $_POST['TenSP'];
                    $HinhAnh;
                    $GiaGoc = $_POST['GiaGoc'];
                    $GiaKM = $_POST['GiaKM'];
                    $Soluong = $_POST['Soluong'];
                    $Xem = $_POST['Xem'];
                    $MoTa = $_POST['MoTa'];
                    $SKU = $_POST['SKU'];
                    $TrangThai = $_POST['TrangThai'];
                    $Hot = $_POST['Hot'];
                    $MaDanhMuc = $_POST['MaDanhMuc'];
                    
                    $kq = sanPham_edit($TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc,$MaSP);
                    if($kq==true){
                        // KQ đúng, đã thêm vào được sản phẩm vào csdl
                        if ($_FILES['HinhAnh']['error']==0) {
                            # code...
                            $kq = move_uploaded_file(
                                $_FILES['HinhAnh']['tmp_name'],
                                "upload/product/".$_FILES['HinhAnh']['name']
                            );
                        }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã sửa sản phẩm thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=product');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                // hiển thị dữ liệu
                $view_name = 'admin_product_edit';
                break;
            case 'product-delete':
                include_once 'model/m_san_pham.php';
                sanPham_delete($_GET['id']);
                header('Location: '.$base_url.'?mod=admin&act=product');
                break;
            case 'user':
                include_once 'model/m_user.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsTK = user_getAll($page);
                $sotrang = ceil(user_countAll()/8);
                $view_name = 'admin_user';
                break;
            case 'user-add':
                include_once 'model/m_user.php';
                if (isset($_POST['submit'])) {
                    $Email = $_POST['Email'];
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $MatKhau = $_POST['MatKhau'];
                    $DiaChi = $_POST['DiaChi'];
                    $HinhAnhTK = 'anh-mac_dinh.jpg';
                    $GioiTinh = $_POST['GioiTinh'];
                    $Quyen = $_POST['Quyen'];
                    $kq = user_add($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen);
                    if($kq){
                        // kiểm tra ảnh có bị lỗi không nếu như không lỗi thì lưu vào
                        // if ($_FILES['HinhAnhTK']['error']==0) {
                        //     # code...
                        //     $kq = move_uploaded_file(
                        //         $_FILES['HinhAnhTK']['tmp_name'],
                        //         "upload/avatar/".$_FILES['HinhAnhTK']['name']
                        //     );
                        // }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã thêm tài khoản thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=user');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                $view_name = 'admin_user_add';
                break;
            case 'user-edit':
                include_once 'model/m_user.php';
                $MaTK = $_GET['id'];
                $CTtk = user_getById($MaTK);
                // bắt lỗi ảnh trùng hoặc ko lấy
                if (isset($_GET['id'])) {
                    // Tạo biến để lưu thông tin sản phẩm cũ
                    $data['tk'] = user_getById($_GET['id']);
                }
                if (isset($_POST['submit'])) {
                    // gán $anh = ảnh mới
                    $HinhAnhTK = $_FILES['HinhAnhTK']['name'];
                    if ($_FILES['HinhAnhTK']['error']!=0) {
                        // không có ảnh hoặc ảnh bị lỗi
                        // lấy lại ảnh củ
                        $HinhAnhTK = $data['tk']['HinhAnhTK'];
                    }
                    $Email = $_POST['Email'];
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $MatKhau = $_POST['MatKhau'];
                    $DiaChi = $_POST['DiaChi'];
                    $HinhAnhTK;
                    $GioiTinh = $_POST['GioiTinh'];
                    $Quyen = $_POST['Quyen'];
                    
                    $kq = user_edit($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen,$MaTK);
                    if($kq==true){
                        // KQ đúng, đã thêm vào được sản phẩm vào csdl
                        if ($_FILES['HinhAnhTK']['error']==0) {
                            # code...
                            $kq = move_uploaded_file(
                                $_FILES['HinhAnhTK']['tmp_name'],
                                "upload/avatar/".$_FILES['HinhAnhTK']['name']
                            );
                        }
                        if($kq){
                            // kq đúng upload thành công
                            $_SESSION['thongbao'] = 'Đã sửa tài khoản thành công'; 
                            header('Location: '.$base_url.'?mod=admin&act=user');
                        }
                        else{
                            $_SESSION['loi'] = "Đã có lỗi xảy ra, hãy thử lại";
                        }
                    }else{
                        // kq sai, thông báo lỗi
                        $_SESSION['loi'] = "Có lỗi không mong muốn xảy ra!, Vui lòng thử lại.";
                    }
                }
                // hiển thị dữ liệu
                $view_name = 'admin_user_edit';
                break;
            case 'user-delete':
                include_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('Location: '.$base_url.'?mod=admin&act=user');
                break;
            case 'cart':
                include_once 'model/m_don_hang.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsDH = donHang_getAllTK($page);
                $sotrang = ceil(donHang_countAll()/8);
                $view_name = 'admin_cart';
                break;
            case 'cart-delete':
                include_once 'model/m_don_hang.php';
                $MaDH = $_GET['id'];
                donHang_delete($MaDH);
                header('location: '.$base_url.'?mod=admin&act=cart');
                break;
            case 'cart-detail':
                include_once 'model/m_don_hang.php';
                $MaDH = $_GET['id'];
                // lấy thông tin của đơn hàng
                $TenKH = donHang_getTK($MaDH);

                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsCTDH = donHang_getChiTietDonhang($MaDH,$page);
                $sotrang = ceil(donHangCT_countAll()/8);

                $view_name = 'admin_cart_detail';
                break;
            case 'cartDetail-delete':
                include_once 'model/m_don_hang.php';
                $MaDH = $_GET['MaDH'];
                $MaCTDH = $_GET['MaCTDH'];
                donHangCT_delete($MaCTDH,$MaDH);
                header('location: '.$base_url.'?mod=admin&act=cart-detail&id='.$MaDH);

                break;
            case 'comment':
                include_once 'model/m_binh_luan.php';
                $dsSpBl = comment_getAllProductByComment();
                $view_name = 'admin_comment';
                break;
            case 'comment-feedback':
                include_once 'model/m_binh_luan.php';
                if (isset($_GET['id'])) {
                    $MaSP = $_GET['id'];
                }
                if (isset($_POST['submit'])) {
                    $noidung = $_POST['NoiDung'];
                    comment_add($MaSP,$_SESSION['user']['MaTK'],$noidung);
                }
                $dsSpBlId = comment_getById($MaSP);
                $view_name = 'admin_comment-feedback';
                break;
            case 'post':
                include_once 'model/m_bai_viet.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsLBV = LoaiBaiViet_getAll($page);
                $sotrang = ceil(loaiBaiViet_countAll()/8);


                $view_name = 'admin_post';
                break;
            case 'post-add':
                include_once 'model/m_bai_viet.php';
                if (isset($_POST['submit'])) {
                    $TenLoaiBai = $_POST['TenLoaiBai'];
                    $TrangThaiLoaiBai = $_POST['TrangThaiLoaiBai'];
                    $ThuTu = $_POST['ThuTu'];
                    $kq = loaiBaiViet_add($TenLoaiBai,$TrangThaiLoaiBai,$ThuTu);
                    if ($kq==true) {
                        $_SESSION['thongbao'] = 'Đã thêm loại bài viết thành công';
                        header('location: '.$base_url.'?mod=admin&act=post');
                    }else{
                        $_SESSION['loi'] = 'Đã có lỗi xảy ra vui lòng thử lại';
                    }
                }
                $view_name = 'admin_post_add';
                break;
            case 'post-edit':
                include_once 'model/m_bai_viet.php';
                $MaLoaiBai = $_GET['id'];
                $LoaiBaiID = loaiBaiViet_GetByID($MaLoaiBai);
                if (isset($_POST['submit'])) {
                    $TenLoaiBai = $_POST['TenLoaiBai'];
                    $TrangThaiLoaiBai = $_POST['TrangThaiLoaiBai'];
                    $ThuTu = $_POST['ThuTu'];
                    $kq = loaiBaiViet_edit($TenLoaiBai,$TrangThaiLoaiBai,$ThuTu,$MaLoaiBai);
                    if ($kq==true) {
                        $_SESSION['thongbao'] = 'Đã sửa loại bài viết thành công';
                        header('location: '.$base_url.'?mod=admin&act=post');
                    }else{
                        $_SESSION['loi'] = 'Đã có lỗi xảy ra vui lòng thử lại';
                    }
                }
                $view_name = 'admin_post_edit';
                break;
            case 'post-delete':
                include_once 'model/m_bai_viet.php';
                $MaLoaiBai = $_GET['id'];
                loaiBaiViet_delete($MaLoaiBai);
                header('location: '.$base_url.'?mod=admin&act=post');
                break;
            case 'baiViet':
                include_once 'model/m_bai_viet.php';
                // có phần trang
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsBV = baiViet_getAll($page);
                $sotrang = ceil(baiViet_countAll()/8);
                $view_name = 'admin_bai_viet';
                break;
            case 'baiViet-add':
                include_once 'model/m_bai_viet.php';
                $MaTK = $_SESSION['user']['MaTK']; // lấy mã tài khoản
                $dsLB = loaiBaiViet_getAllBv(); // lấy hết loại bài
                if (isset($_POST['submit'])) { // neu như nút têm bài viết được nhấn
                    // gán từng giá trị bên form vào từng biến
                    $TieuDe = $_POST['TieuDe'];
                    $NgayDangBai = $_POST['NgayDangBai'];
                    $LuotXem = $_POST['LuotXem'];
                    $TrangThaiBai = $_POST['TrangThaiBai'];
                    $NoiBat = $_POST['NoiBat'];
                    $MaLoaiBai = $_POST['MaLoaiBai'];
                    $NoiDung = $_POST['NoiDung'];
                    // tạo biến kết quả để gán cho hàm thêm bài viết
                    $kq = baiViet_add($TieuDe,$NoiDung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai);
                    if ($kq==true) { // nếu như đúng - thêm bài viết thành công
                        $_SESSION['thongbao'] = 'Đã thêm bài viết thành công'; // tạo thông báo thành công
                        header('location: '.$base_url.'?mod=admin&act=baiViet'); // chuyển sang trang quản lý bài viết
                    }else { // nếu như lỗi thì
                        $_SESSION['loi'] = 'Đã có lỗi xảy ra vui lòng thử lại!'; // hiện thông báo lỗi
                    }
                }
                $view_name = 'admin_bai_viet_add';
                break;
            case 'baiViet-edit':
                include_once 'model/m_bai_viet.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $MaBaiViet = $_GET['id'];
                $CTbv = baiviet_getByID($MaBaiViet);
                $dsLB = loaiBaiViet_getAllBv();
                if (isset($_POST['submit'])) {
                    $TieuDe = $_POST['TieuDe'];
                    $NgayDangBai = $_POST['NgayDangBai'];
                    $LuotXem = $_POST['LuotXem'];
                    $TrangThaiBai = $_POST['TrangThaiBai'];
                    $NoiBat = $_POST['NoiBat'];
                    $MaLoaiBai = $_POST['MaLoaiBai'];
                    $NoiDung = $_POST['NoiDung'];
                    $kq = baiViet_edit($TieuDe,$NoiDung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai,$MaBaiViet);
                    if ($kq==true) {
                        $_SESSION['thongbao'] = 'Đã sửa bài viết thành công';
                        header('location: '.$base_url.'?mod=admin&act=baiViet');
                    }else {
                        $_SESSION['loi'] = 'Đã có lỗi xảy ra vui lòng thử lại!';
                    }
                }
                $view_name = 'admin_bai_viet_edit';
                break;
            case 'baiViet-delete':
                include_once 'model/m_bai_viet.php';
                $MaBaiViet = $_GET['id'];
                $MaTK = $_SESSION['user']['MaTK'];
                baiViet_delete($MaBaiViet,$MaTK);
                header('location: '.$base_url.'?mod=admin&act=baiViet');
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_admin-layout.php';
    }

?>