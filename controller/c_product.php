<?php
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'list':
                include_once 'model/m_san_pham.php'; // nhúng file model để sywr lý và lấy dữ liệu
                include_once 'model/m_danh-muc.php';
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $MaDanhMuc = $_GET['id']; // lấy giá trị id để gán có biến mã danh mục
                    $kt = danhMuc_getById($MaDanhMuc);
                    if ($kt==true) {
                        $page = 1;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        }
                        $dsSPDM = sanPham_getDanhMuc($MaDanhMuc,$page); // lấy hất sản phẩm có cùng với mã danh mục
                        $sotrang = ceil(sanpham_getTotal($_GET['id'])/8);
                    }else {
                        $_SESSION['loi'] = 'Không tìm thấy mã danh mục';
                    }
                }else {
                    $_SESSION['loi'] = 'Không tìm thấy mã danh mục';
                }

                $view_name = 'product_list';
                break;
            case 'detail':
                include_once 'model/m_san_pham.php'; 
                include_once 'model/m_binh_luan.php';
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $MaSP = $_GET['id']; // lấy giá trị id và gãn cho biến mã sản phẩm
                    $dsSanPham = sanPham_getById($MaSP); 
                    if ($dsSanPham==true) {
                        $tangXem = sanPham_tangLuotXem($_GET['id']);
                        $dsRandomDanhMuc = sanPham_getRandomByDanhMuc($dsSanPham['MaDanhMuc']);
                        $dsBL = comment_getById($_GET['id']);
                    }else {
                        $_SESSION['loi'] = 'Không tìm thấy mã sản phẩm';
                    }
                }else {
                    $_SESSION['loi'] = 'Không tìm thấy mã sản phẩm';
                }
                
                $view_name = 'product_detail';
                break;
            case 'addToCart':
                include_once 'model/m_don_hang.php';
                include_once 'model/m_san_pham.php';
                $MaSP = $_GET['id']; //gán id sản phẩm để dùng cho tiện
                $spCT = sanPham_getById($MaSP); // tạo biến lưu trũ trhoong tin của một sản phẩm theo id
                // kiểm tra tài khoản có tồn tại chưa - đã đăng nhập chưa
                if(!isset($_SESSION['user'])){ // nếu như không tồn tại tài khoản user
                    $_SESSION['loi'] = 'Bạn cần đăng nhập để thêm sản phẩm này!'; // tạo thông báo lỗi
                    header("Location: ".$base_url."?mod=user&act=login"); // chuyển về trang đăng nhập
                }else{
                    $MaTK = $_SESSION['user']['MaTK']; // tạo biến để lưu mã tài khoản
                    // kiểm tra đơn hàng này đã tồn tại chưa - nếu đã tồn tại cho phép thêm
                    $checkIsset = donHang_checkIsset($MaTK); // kiểm tra đơn hàng đã tồn tại chưa
                    if ($checkIsset==true) { // nếu như đươn hàng đã tồn tại
                        $checkTrung = donHang_trungDonHang($checkIsset['MaDH'],$MaSP); // hàm kiểm tra sản phẩm đã bị trừng
                        if ($checkTrung==true) { // nếu bị trung sản phẩm trong 1 đơn hàng
                            $_SESSION['loi'] = 'Sản phẩm này đã được thêm vào trước đó!'; // tạo thông báo lỗi 
                            header("location: ".$base_url."?mod=product&act=detail&id=".$MaSP); // chuyển lại trang chi tiết sản phẩm đó
                        }else{ // nếu như sản phẩm chưa có 
                            $addCart = donHang_addToCart($checkIsset['MaDH'],$MaSP,$spCT['GiaGoc']); // tạo hàm thêm sản phẩm vào chi tiết đơn hàng
                            if ($addCart==true) { // thếm thành công
                                $_SESSION['thongbao'] = 'Đã thêm sản phẩm thành công!'; // tạo biến thông báo thành công
                                header("location: ".$base_url."?mod=product&act=detail&id=".$MaSP); // chuyển lại trang sản phẩm đó 
                            }else{ // thêm không thành công
                                $_SESSION['loi'] = 'Đã có lỗi xảy ra khi thêm sản phẩm'; // tạo biến thông báo lỗi 
                                header("location: ".$base_url."?mod=product&act=detail&id=".$MaSP); // chuyển lại trang sản phẩm đó 
                            }
                        }
                    }else{ // nếu như chưa có đơn hàng
                        donHang_addCart($MaTK); // tạo đơn hàng
                        $checkIsset = donHang_checkIsset($MaTK);
                        $addCart = donHang_addToCart($checkIsset['MaDH'],$MaSP,$spCT['GiaGoc']); // thêm sản phẩm vào đơn hàng chi tiết
                        if ($addCart==true) {
                            $_SESSION['thongbao'] = 'Đã thêm sản phẩm thành công!';
                            header("location: ".$base_url."?mod=product&act=detail&id=".$MaSP);
                        }else{
                            $_SESSION['loi'] = 'Đã có lỗi xảy ra khi thêm sản phẩm';
                            header("location: ".$base_url."?mod=product&act=detail&id=".$MaSP);
                        }
                    }
                }
                break;
            case 'cart':
                include_once 'model/m_don_hang.php';
                include_once 'model/m_san_pham.php';
                $dsRanDomsp = sanPham_getRandomSanPham();
                if (!isset($_SESSION['user'])) {
                    $_SESSION['loi'] = 'Bạn cần đăng nhập để xem giỏ hàng';
                    header('location: '.$base_url.'?mod=user&act=login');
                }else{
                    $MaTK = $_SESSION['user']['MaTK'];
                    $checkIsset = donHang_checkIsset($MaTK);
                    if ($checkIsset==true) {
                        $countDonHang = donHang_CountDonHang($checkIsset['MaDH']);
                        $dsDonHang = donHang_getAllDonHang($checkIsset['MaDH']);
                    }
                }
                
                $view_name = 'page_cart';
                break;
            case 'pay':
                include_once 'model/m_don_hang.php';
                $MaDH = $_GET['id'];
                $TongTien = $_GET['gia'];
                $MaTK = $_SESSION['user']['MaTK'];
                if (isset($_POST['submit-thanh_toan'])) {
                    $TenKH = $_POST['TenKH'];
                    $DiaDiem = $_POST['DiaDiem'];
                    $Ghichu = $_POST['Ghichu'];
                    if ($TenKH=='' || $DiaDiem=='' || $Ghichu=='') {
                        $_SESSION['loi'] = 'Bạn chưa nhập đủ thông tin';
                    } else {
                        $dsSP = donHang_getAllDonHang($MaDH);
                        foreach ($dsSP as $ds) {
                            donHang_truSoLuong($ds['MaSP']);
                        }
                        $kq = donHang_pay($MaTK,$Ghichu,$TenKH,$DiaDiem,$TongTien,$MaDH);
                        if ($kq==true) {
                            header('location: '.$base_url.'?mod=product&act=success');
                        }else{
                            $_SESSION['loi'] = 'Đã có lỗi xảy ra khi thanh toán!';
                            header('location: '.$base_url.'?mod=product&act=pay&id='.$MaDH.'&gia='.$TongTien);
                        }
                    }
                }

                $view_name = 'product_pay';
                break;
            case 'success': 

                $view_name = 'product_success';
                break;
            case 'deleteCart':
                include_once 'model/m_don_hang.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $checkIsset = donHang_checkIsset($MaTK);
                if ($checkIsset==true) {
                    if (isset($_GET['id'])) {
                        $MaSP = $_GET['id'];
                        donHang_deleteCartById($MaSP,$checkIsset['MaDH']);
                    }
                    header("location: ".$base_url."?mod=product&act=cart");
                }
                break;
            case 'search':
                // lấy - xử lý dữ liệu
                include_once 'model/m_san_pham.php';
                if (isset($_POST['keyword'])) {
                    // đổi từ POOSST sang GET
                    header("Location: ".$base_url."?mod=product&act=search&keyword=".$_POST['keyword']);
                }
                $keyword = $_GET['keyword'];
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsSearch = sanPham_search($keyword,$page);
                $sotrang = ceil(sanPham_searchTotal($keyword)/8);
                
                // hiển thị dữ liệu
                $view_name = 'product_search'; 
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_user-layout.php';
    }
?>
