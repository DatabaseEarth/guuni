<?php
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'login':
                include_once 'model/m_user.php';
                // lấy giá trị từ form post
                if (isset($_POST['submit-login'])) { // nếu nhấn nút đăng nhập
                    $email = $_POST['email'];  // lấy giá trị từ input => name
                    $pass = $_POST['pass'];

                    $check = user_checkEmailLogin($email); // kiểm tra email có tồn tại không
                    if ($check==true) { // nếu nhưn kiểm tra có tồn tại email
                        $ketqua = user_login($email,$pass);
                        if ($ketqua) { //kiểm tra nêu snhuw đăng nhập đúng thì lưu thông tin đăng nhập
                            $_SESSION['user'] = $ketqua; // tạo biến session user để lưu thông tin đăng nhập
                            header('Location: ?mod=page&act=home'); // chuyển ra trang chủ
                        }else{ // nếu như pass sai thì thông báo lỗi
                            $_SESSION['loi'] = "Đăng nhập không thành công!, Kiểm tra email hoặc mật khẩu!";
                        }
                    }else{ // nếu như kiểm tra email không tồn tại thì thông báo lỗi
                        $_SESSION['loi'] = "Tài khoản không tồn tại?";
                    }
                        # code...
                }
                $view_name = 'user_login';
                break;
            case 'register':
                include_once 'model/m_user.php';
                // kiểm tra form đăng ký 
                if (isset($_POST['submit-register'])) { // nếu như nút đăng ký đc nhấn
                    $email = $_POST['email'];
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];
                    $sodienthoai = $_POST['sodienthoai'];
                    $diachi = $_POST['diachi'];
                    $gioitinh = $_POST['gioitinh'];
                    // gán giá trị ảnh mặc định khi tạo tài khoản
                    $hinhanhTK = 'anh-mac_dinh.jpg';
                    // bắt lỗi form đăng ký khi để tróng thông tin từ trên xuống
                    if($email == '') {
                        $_SESSION['thieu-email'] = "Chưa nhập email";
                    }
                    elseif($sodienthoai == ''){
                        $_SESSION['thieu-sodienthoai'] = "Chưa nhập số điện thoại";
                    }
                    elseif($diachi == ''){
                        $_SESSION['thieu-diachi'] = "Chưa nhập địa chỉ";
                    }
                    elseif($gioitinh == ''){
                        $_SESSION['thieu-gioitinh'] = "Chưa chọn giới tính";
                    }
                    elseif($pass1 == ''){
                        $_SESSION['thieu-matkhau'] = "Chưa nhập mật khẩu";
                    }
                    elseif($pass2 == ''){
                        $_SESSION['thieu-xacnhan'] = "Chưa nhập xác nhận mật khẩu";
                    }else{
                        // kiểm tra email đăng ký đã tồn tại chưa
                        $checkEmail = user_checkEmailLogin($email);
                        if ($checkEmail==true) { // nếu như eamil đăng ký đã tồn tại thì hiện thông báo lỗi
                            $_SESSION['loi'] = 'Email này đã tồn tại, vui lòng sử dụng email khác!';
                        }else{ // nếu như email không tồn tại thì cho phép đăng ký
                            if ($pass1 == $pass2) { // kiểm tra xác nhận mật khẩu 
                                user_register($email,$sodienthoai,$diachi,$gioitinh,$pass2,$hinhanhTK); // cho phép đăng ký
                                $_SESSION['thongbao'] = "Bạn đã tạo tài khoản thành công, vui lòng đăng nhập!";
                                header("Location: ?mod=user&act=login"); // chuyển tời trang đăng nhập để đăng nhập
                            }else{ // nếu như xác nhận mật khẩu sai thì hiện thông báo lỗi
                                $_SESSION['loi'] = "Xác nhận mật khẩu không đúng!";
                            }
                        }
                    }

                }
                $view_name = 'user_register';
                break;
            case 'logout':
                unset($_SESSION['user']);
                header("Location: ?mod=page&act=home");
                break;
            case 'comment':
                include_once 'model/m_binh_luan.php';
                comment_add($_POST['MaSanPham'],$_SESSION['user']['MaTK'],$_POST['NoiDung']);
                header("Location: ?mod=product&act=detail&id=".$_POST['MaSanPham']);
                break;
            case 'edit':
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
                    $TenTK = $_POST['TenTK'];
                    $Email = $_POST['Email'];
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $MatKhau = $_POST['MatKhau'];
                    $DiaChi = $_POST['DiaChi'];
                    $HinhAnhTK;
                    $GioiTinh = $_POST['GioiTinh'];
                    $TenTK = $_POST['TenTK'];
                    
                    $kq = user_editUser($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$TenTK,$MaTK);
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
                            header('Location: '.$base_url.'?mod=user&act=edit&id='.$MaTK);
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
                $view_name = 'user_edit';
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_user-layout.php';
    }
?>
