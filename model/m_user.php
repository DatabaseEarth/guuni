<?php
    include_once 'model/m_pdo.php';

    function user_login($email,$pass){
        return pdo_query_one("SELECT * FROM tai_khoan WHERE Email = ? AND MatKhau = ?",$email,$pass);
    }
    function user_checkEmailLogin($email){
        return pdo_query_one("SELECT * FROM tai_khoan WHERE Email = ?",$email);
    }
    function user_register($email,$sodienthoai,$diachi,$gioitinh,$pass2,$hinhanhTK){
        pdo_execute("INSERT INTO tai_khoan (`Email`, `GioiTinh`, `MatKhau`, `DiaChi`, `SoDienThoai`, `HinhAnhTK`) VALUES (?, ?, ?, ?, ?, ?)", $email, $gioitinh, $pass2, $diachi, $sodienthoai,$hinhanhTK);
    }
    function user_editUser($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$TenTK,$MaTK){
        return pdo_execute("UPDATE `tai_khoan` SET `Email`= ? ,`SoDienThoai`= ? ,`MatKhau`= ? ,`DiaChi`= ? ,`HinhAnhTK`= ? ,`GioiTinh`= ? ,`TenTK`= ? WHERE MaTK = ?",$Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$TenTK,$MaTK);
    }
    
    function user_getAll($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM tai_khoan ORDER BY MaTK DESC LIMIT $batdau, 8");
    }
    function user_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM tai_khoan");
    }
    function user_getAllUser(){
        return pdo_query_value("SELECT COUNT(*) FROM tai_khoan WHERE Quyen=0");
    }
    function user_add($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen){
        return pdo_execute("INSERT INTO tai_khoan(`Email`, `SoDienThoai`, `MatKhau`, `DiaChi`, `HinhAnhTK`, `GioiTinh`, `Quyen`) VALUES ( ?, ?, ?, ?, ?, ?, ?)",$Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen);
    }
    function user_getById($MaTK){
        return pdo_query_one("SELECT * FROM tai_khoan WHERE MaTK = ?",$MaTK);
    }
    function user_edit($Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen,$MaTK){
        return pdo_execute("UPDATE `tai_khoan` SET `Email`= ? ,`SoDienThoai`= ? ,`MatKhau`= ? ,`DiaChi`= ? ,`HinhAnhTK`= ? ,`GioiTinh`= ? ,`Quyen`= ? WHERE MaTK = ?",$Email,$SoDienThoai,$MatKhau,$DiaChi,$HinhAnhTK,$GioiTinh,$Quyen,$MaTK);
    }
    function user_delete($MaTK) {
        pdo_execute("DELETE FROM tai_khoan WHERE MaTK = ?",$MaTK);
    }
?>